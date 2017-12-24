@extends(config("mailMessages.backend_layout"))

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Start sending this message ?</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('backend/dashboard')}}">Dashboard</a>
            </li>
            <li>
                <a href="{{route('mail.messages')}}">{{trans('messages.index_title')}}</a>
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
                                        {{-- @ include("backend.filters") --}}
                                        <input type="hidden" name="message_id" value="{{$message_id}}">
                                        <button type="submit" class="btn btn-primary">Send</button>

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
<!-- ./Horizontal Form -->

<!-- ./data table -->
@stop

@section('js')
<?php //  \App\Http\Controllers\Helpers\Html\Froala\FroalaEditor::init_js()?>
@stop
