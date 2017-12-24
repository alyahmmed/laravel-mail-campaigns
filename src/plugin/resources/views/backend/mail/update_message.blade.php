@extends(config("mailMessages.backend_layout"))

@section('content')
<?php 
    if (! $message->id) {
        $title = 'Add Message';
    } else { if ($message->is_finished == 1 && $message->send_pulse == 1) {
        $title = 'Edit Message Before Send';
    } else {
        $title = 'Edit Message';
    }}
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>{{$title}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('backend/dashboard')}}">Dashboard</a>
            </li>
            <li>
                <a href="{{route('mail.messages')}}">{{trans('messages.index_title')}}</a>
            </li>
            <li class="active">
                <strong>{{$title}}</strong>
            </li>
        </ol>
    </div>
</div>

<div class="fh-breadcrumb animated fadeInRight">
    <div class="full-height">
        <div class="full-height-scroll border-left">
            <div class="element-detail-box">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5></h5>

                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content"> 
                                <div class="row">
        <form method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Subject</label>
                <input type='text' name='subject' value='{{$message->subject}}' class="form-control" required=""/>
            </div>
            <br/>
            <div class="form-group">
                {!!\App\Http\Controllers\Helpers\Html\Froala\FroalaEditor::init_editor('content', 'content', $message->content)!!}
            </div>
            <br/>

            <button name="send_now" value="1" type="submit" class="btn btn-info">Send now</button>

            <div class="col-md-1">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
{!!\App\Http\Controllers\Helpers\Html\Froala\FroalaEditor::init_css()!!}
{!!\App\Http\Controllers\Helpers\Html\Froala\FroalaEditor::init_js()!!}
@stop
