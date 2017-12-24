<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Input;
use DB;
use App\Models\MailMessages;
use App\Models\MailList;
use App\Models\MailTrack;

/**
 * Description of Groups
 *
 * @author Elsayed Nofal
 */
class MailController extends BackendController {

    function createMeaage() {
        $data = [];
        $input_all = Input::except('send_now');
        if (Input::has('content')) {
            $mail_message = new MailMessages();
            if ($mail_message->validate($input_all)) {
                return $this->storeAndRedirect($mail_message);
            } else {
                $data['v_errors'] = $mail_message->errors();
            }
        }
        $data['message'] = new MailMessages;
        return view('backend.mail.update_message', $data);
    }

    function messagesHome() {
        $data['messages'] = MailMessages::orderBy("created_at", "desc")->get();
        return view('backend.mail.messages_home', $data);
    }

    /*
     * if flag = 0 then the request means that the message has not been sent before and the user needs to update it.
     * if flag = 1 then the request means that the message has been sent before and the user needs to copy it to send it again.
     */

    function updateMessage($id) {
        // dd(Input::all());
        $input_all = Input::except('send_now');
        $data['message'] = $message = MailMessages::find($id);
        if (!is_object($message) || ($message->is_finished == 0 && $message->send_pulse == 1)) {
            return redirect(route('mail.messages'));
        } else {
            if (Input::has('subject')) {
                if ($message->validate($input_all)) {
                    if ($message->is_finished == 1 && $message->send_pulse == 1) {
                        $message = new MailMessages();
                    }
                    return $this->storeAndRedirect($message);
                } else {
                    $data['v_errors'] = $message->errors();
                }
            }
            return view('backend.mail.update_message', $data);
        }
    }

    function storeAndRedirect($message)
    {
        $input_all = Input::except('send_now');
        $message->fill($input_all);
        $message->save();
        $mail = MailMessages::find($message->id);
        $text = $mail->content;
        $test = preg_match_all('/(http|https|ftp|ftps)(\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3})(\/[a-zA-Z0-9\-\_\/]*)?/', $mail->content, $matches);
        foreach ($matches[0] as $match) {
            // $text = str_replace($match, $match . '?$mail_id=' . $mail->id . '&mail=' . $mail->id, $text);
        }
        $mail->content = $text;
        $mail->save();
        if (Input::has('send_now')) {
            return redirect(route('mail.messages.filter-emails', $mail->id));
        }
        return redirect(route('mail.messages'));
    }

    function filterEmails($message_id) {
        $data["message_id"] = $message_id;
        if (Input::has('message_id')) {
            $message = MailMessages::find($message_id);
            $message->location_id = Input::get('location_id');
            // $message->device_id = Input::get('device_id');
            $message->send_pulse = 1;
            $message->send_pulse_time = time();
            $message->save();
            return redirect(route('mail.messages'));
        }
        return view('backend.mail.filter_emails', $data);
    }

    function deleteMessage($id) {
//        $mail_message = MailMessages::find($id)->delete();
        $mail_message = MailMessages::find($id);
        if (!is_object($mail_message) || ($mail_message->is_finished == 0 && $mail_message->send_pulse == 1)) {
            return redirect(route('mail.messages'));
        } else {
            $mail_message->delete();
        }
        return redirect(route('mail.messages'));
    }

    // sending message
    function send() {
        $mail_limit = 100;

        $domain_name = url('/');
        $message = MailMessages::where('is_finished', 0)->where("send_pulse", 1)
                        ->orderBy('send_pulse_time', 'asc')->get();
        if (count($message->toArray()) == 0)
            die;
        $message = $message[0];
        if ($message->start == 0) {
            $message->start = time();
            $message->save();
        }
        /*
         * 'diabetes_id','type_visitor_id',,'nationality_id','p_interests_id','s_interests_id',
         * 'case_id'
         */
        $mail_list = MailList::where('status', 0)->take($mail_limit);
        // $properties = ['device_id','location_id'];
        $properties = [];
        foreach ($properties as $key) {
            if ($message->$key != 0) {
                $mail_list->where($key, $message->$key);
            }
        }
        $mail_count = $mail_list->count();

        if ($mail_count == 0) {
            $message->end = time();
            $message->is_finished = 1;
            $message->save();
            die();
        }
        if ($mail_count != 0 && $mail_count < $mail_limit) {
            $message->end = time();
            $message->is_finished = 1;
            $message->save();
        }
        foreach ($mail_list->get() as $email) {
            $content = $this->genrateTrackingCode($message->id, $email->id);
            $message->content = str_replace('__username__', $email->name, $message->content);
            $content .= $message->content;
            $content = str_replace('./', $domain_name, $content);
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $headers .= 'From: ' . config("mailMessages.from_email") . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            $mail = mail($email->email, $message->subject, $content, $headers);
            if ($mail) {
                $message->sent_count += 1;
                $message->save();
                $message->content = str_replace($email->name, '__username__', $message->content);
                $email->status = 1;
                $email->save();
            }
        }
        if ($mail_count < $mail_limit) {
            DB::table('mail_list')->update(['status' => 0]);
        }
    }

    private function genrateTrackingCode($message_id, $email_id) {
        return "<img style='display:none' src='" . url('/admin/mail/track?message_id=' . $message_id . '&email_id=' . $email_id . '') . "' width='1'/>";
    }

    function track() {
        if (isset($_GET['message_id']) && isset($_GET['email_id'])) {
            $mailcheck = MailTrack::where("message_id", $_GET['message_id'])->where("email_id", $_GET['email_id'])->first();
            if (!is_object($mailcheck)) {
                $mail_track = new MailTrack();
                $mail_track->message_id = $_GET['message_id'];
                $mail_track->email_id = $_GET['email_id'];
                $mail_track->time = time();
                $mail_track->save();
            }
        }

        pixel();
        die;
    }

//    //statistics
//    function statistics($id) {
//        $message = MailMessages::find($id);
//
//
//        $opend_count = MailTrack::where('message_id', $id)
//                ->count();
//        return view('backend.mail.statistic')
//                        ->with('message', $message)
//                        ->with('opend_count', $opend_count);
//    }

    function sendTest() {
        $message = MailMessages::where('id', $_POST["message_id"])->first();
        if (is_object($message)) {
            $domain_name = url('/');
            $content = $message->content;
            $content = str_replace('./', $domain_name, $content);
            //echo $content;die;
            $headers = 'MIME-Version: 1.0' . "\r\n";

            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $headers .= 'From: ' . config("mailMessages.from_email") . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            echo $_POST["email"] . "<br/>";
            echo $message->subject . "<br/>";
            echo $content . "<br/>";
            echo "<hr><br/>";
            $mail = mail($_POST["email"], $message->subject, $content, $headers);
            if ($mail) {
                echo "message sent succssfuly";
            }
        }
    }

}
