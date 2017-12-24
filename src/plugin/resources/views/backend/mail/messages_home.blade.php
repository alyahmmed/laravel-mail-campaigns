@extends(config("mailMessages.backend_layout"))

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>{{trans('messages.index_title')}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('backend/dashboard')}}">Dashboard</a>
            </li>
            <li class="active">
                <strong>{{trans('messages.index_title')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8" data-action="airlines.create">
        <div class="title-action">
            <a class="btn btn-primary btn-lg" title="Create New Row" href="{{route('mail.messages.create')}}"><span class="glyphicon glyphicon-plus-sign" ></span></a>
        </div>
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
                            <button style="float:right;" id="all"  class="btn btn-info">All</button>
                            <button style="float:right;margin-right: 5px;" id="sentbefore"  class="btn btn-danger">Sent Before</button>
                            <button style="float:right;margin-right: 5px;" id="notsentbefore"  class="btn btn-worning">Not Sent Before</button>
                            <button style="float:right;margin-right: 5px;" id="sendingnow"  class="btn btn-default">Sending Now</button>
                                </div>
                                <div class="row">

                            <div class="table-responsive">
                            <!--<table class="table table-bordered table-striped table-sortable">-->
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Send Time</th>
                                            <th>Send Count</th>
                                            <th>Opened Count</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>                               
                                    <tbody id='table-data'>
                                        @foreach($messages as $row)
                                        <?php if ($row->start == 0 && $row->end == 0 && $row->is_finished == 0 && $row->send_pulse == 0) { ?>
                                            <tr class="not-sent-before">
                                                <td>{{$row->subject}}</td>
                                                <td>Not sent before</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>
                                                    <a href="{{route('mail.messages.filter-emails', $row->id)}}" class="btn default btn-xs red" title="Send">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="{{route('mail.messages.update', $row->id)}}" class="btn default btn-xs red">
                                                        <i class="fa fa-edit"></i> 
                                                    </a>
                                                    <a href="{{route('mail.messages.delete', $row->id)}}" onclick="return confirm('Are you sure you want to delete this Massege?')" class="btn default btn-xs red">
                                                        <i class="fa fa-trash"></i> 
                                                    </a>

                                                    <a href="JavaScript:void(0)" class="btn default btn-xs red sendtest" data-id ="{{$row->id}}" title="Send Test">
                                                        Send Test
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } elseif ($row->start > 0 && $row->end > 0 && $row->is_finished == 1 && $row->send_pulse == 1) {
                                            ?>
                                            <tr class="sent-before">
                                                <td>{{$row->subject}}</td>
                                                <td>{{date("Y-m-d H:i:s",$row->send_pulse_time)}}</td>
                                                <td>{{$row->sent_count}}</td>
                                                <td>{{$row->track()->count()}}</td>
                                                <td>
                                                    <a href="{{route('mail.messages.update', $row->id)}}" class="btn default btn-xs red" title="Resend">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="{{route('mail.messages.delete', $row->id)}}" onclick="return confirm('Are you sure you want to delete this Massege?')" class="btn default btn-xs red">
                                                        <i class="fa fa-trash"></i> 
                                                    </a>
                                                    <!--                                <a href="./backend/mail/statistics/{{$row->id}}" class="btn default btn-xs red">
                                                                                        <i class="fa fa-bar-chart"></i> 
                                                                                    </a>-->
                                                    <a href="JavaScript:void(0)" class="btn default btn-xs red sendtest" data-id ="{{$row->id}}" title="Send Test">
                                                        Send Test
                                                    </a>
                                                </td>
                                            </tr>  
                                        <?php } elseif ($row->send_pulse == 1) {
                                            ?>
                                            <tr class="sending">
                                                <td>{{$row->subject}}</td>      
                                                <td>{{date("Y-m-d H:i:s",$row->send_pulse_time)}}</td>
                                                <td>{{$row->sent_count}}</td>
                                                <td>{{$row->track()->count()}}</td>

                                                <td>
                                                    <a href="JavaScript:void(0)" class="btn default btn-xs" title="Sending">
                                                        <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                                                        <span class="sr-only"></span>
                                                    </a>
                                                    <!--                                <a href="./backend/mail/statistics/{{$row->id}}" class="btn default btn-xs red">
                                                                                        <i class="fa fa-bar-chart"></i> 
                                                                                    </a>-->
                                                </td>
                                            </tr> 
                                            <?php
                                        }
                                        ?>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send Test Mail</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Email : [If there are many E-mails separate them with " , " ]</label>
                    <input name="email" type="text" value="" class="form-control">
                    <input name="message_id" class="themessageid" type="hidden" value="0">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="submitmodal" class="btn btn-primary">Send</button>
            </div>
        </div>

    </div>
</div>
<!-- Modal -->
<div id="sucmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send Test Mail</h4>
            </div>
            <div class="modal-body">
                <p> Test message has been sent successfully. </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


@stop


@section('js')
<script>
    $(document).ready(function () {

        $("#all").click(function (e) {
            $('tbody tr').show();
        });
        $("#sentbefore").click(function (e) {
            $('tbody tr').hide();
            $(".sent-before").show();
        });
        $("#notsentbefore").click(function (e) {
            $('tbody tr').hide();
            $(".not-sent-before").show();
        });
        $("#sendingnow").click(function (e) {
            $('tbody tr').hide();
            $(".sending").show();
        });
        $(".sendtest").click(function () {
            $(".themessageid").val($(this).data("id"));
            $('#myModal').modal('show');
        });

        $("#submitmodal").click(function (e) {
            e.preventDefault();
            var emails = $("input[name=email]").val();
            var message_id = $("input[name=message_id]").val();
            if (emails == '' || message_id == '') {
                alert("Email field is required");
                return false;
            }
//            mail/message/send-test
            $.ajax({
                url: "{{route('mail.messages.send-test')}}",
                data: {
                    _token: '{{csrf_token()}}',
                    email: emails,
                    message_id: message_id
                },
                type: 'POST',
                success: function (res) {
                    $('#myModal').modal('hide');
                    $('#sucmodal').modal('show');
                }
            }).done(function () {
                $(this).addClass("done");
            });
        });


        var name, header, footer;

        $('#add').click(function (e) {
            e.preventDefault();
            var level = $(this).attr('data-level');
            if (level === 'name') {
                // name=$('#name').val();
                $('#theme_name').hide();
                $('#theme_header').show();
                $(this).attr('data-level', 'header');
            } else if (level === 'header') {
                //header=$('#header').val();
                $('#theme_header').hide();
                $('#theme_footer').show();
                $(this).attr('data-level', 'footer');
                $(this).attr('type', 'submit');
                $(this).html('complete');
            } else if (level === 'footer') {
                $('#add-theme').submit();
            }
        });
    }
    );
</script>

<?= App\Http\Controllers\Helpers\Html\Froala\FroalaEditor::init_js() ?>
@stop

