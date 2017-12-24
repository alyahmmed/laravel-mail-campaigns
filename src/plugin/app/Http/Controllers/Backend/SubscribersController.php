<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Input;
use App\Models\MailList;
// use App\Models\UsersProperties;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class SubscribersController extends BackendController {

    function index() {
        $app = \App::getFacadeRoot();
        $app->register('Maatwebsite\Excel\ExcelServiceProvider');
        if (isset($_FILES["excel"])) {
            $dataa = Excel::load($_FILES["excel"]["tmp_name"], function($reader) {
                        
                    })->get();
            if (!empty($dataa) && $dataa->count()) {
               // $x = 0;
               // dd($data);
                foreach ($dataa as $key => $value) {
                    $exist = MailList::where('email', $value->email)->first();
                    if ($value->email != "" && ! $exist) {
                        $maillistraw = new MailList;
                        $maillistraw->name = $value->name;
                        $maillistraw->phone = $value->phone;
                        $maillistraw->email = $value->email;
                        $maillistraw->save();
                    }
                   // $x++;
                }
            }
            
        }

        $data['subscribers'] = new MailList;
        if (isset($_GET['sort'])) {
            $data['subscribers'] = $data['subscribers']->orderBy($_GET['sort'], $_GET['dir']);
        }
        $data['subscribers'] = $data['subscribers']->paginate(10);
        // $data['proberty'] = new UsersProperties;
        return view('backend.subscriber.index', $data);
    }

    function show($id) {
        $data['subscribe'] = MailList::find($id);
        // $proberty = new UsersProperties;
        return view('backend.subscriber.show', $data);
    }

    function delete($id) {
        $subscribe = MailList::find($id);
        $subscribe->delete();
        session()->push('m', "One Item has been deleted successfully .");
        return redirect(route('subscribers.index'));
    }

    function export() {
        $app = \App::getFacadeRoot();
        $app->register('Maatwebsite\Excel\ExcelServiceProvider');
        
        $data['subscribe'] = MailList::orderBy('id', 'DESC')->select('name','email','phone','company','country')->get();
        Excel::create('subscribers', function($excel) use($data) {
            $excel->setTitle('subscribers  report ');

            // Chain the setters
            $excel->setCreator('Icldc')->setCompany('ICLDC');

            $excel->setDescription('subscribers report ');
            $excel->sheet('Sheetname', function($sheet) use($data) {

                $sheet->fromArray($data['subscribe']);

            });

        })->export('xls');
    }

}
