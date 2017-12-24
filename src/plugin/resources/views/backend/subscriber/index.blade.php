@extends(config("mailMessages.backend_layout"))

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>{{trans('subscribers.subscriber')}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('backend/dashboard')}}">Dashboard</a>
            </li>
            <li class="active">
                <strong>{{trans('subscribers.subscriber')}}</strong>
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

    @if(Session::has('n'))
    <?php
    $a = [];
    $a = session()->pull('n');
    ?>
    <div class="alert alert-danger" role="alert">{{$a[0]}} </div>
    <?php session()->forget('n'); ?>
    @endif @if(Session::has('m'))
    <?php
    $a = [];
    $a = session()->pull('m');
    ?>
    <div class="alert alert-success" role="alert">{{$a[0]}} </div>
    <?php session()->forget('m'); ?>
    @endif


    <div class="row" style="display: block;">
        <form method="post" id="importexcel" action="" enctype="multipart/form-data" style="display:inline; padding:15px;border:1px solid #364760;margin-right: 10px;">
            {{ csrf_field() }}
            <input type="file" id="theexcel" name="excel" value="" style="display:inline;">
            <button id="subform" class="btn btn-danger">Import Mail List</button>
            <a href='./assets/MailListSample.xlsx' class="btn btn-info">Download Sample</button>
            <!--<a class="btn btn-danger" href="{{URL('backend/importsubecribe')}}">Import</a>-->
        </form>
        <a class="btn btn-primary" href="{{route('subscribers.export')}}">Export</a>
    </div>
    <hr>
    <br>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>

                    <th>{{trans('subscribers.name')}}</th>

                    <th>{{trans('subscribers.email')}}</th>


                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($subscribers as $subscribe)
                    <td>{{$subscribe->name}}</td>
                    <td>{{$subscribe->email}}</td>
                    <td>
                        <a href="{{route('subscribers.find', $subscribe->id)}}" class="btn green">
                            <i class="fa fa-eye"></i> {{trans('subscribers.show')}}
                        </a>

                        <a id="del" href="{{route('subscribers.delete', $subscribe->id)}}" onclick="return confirm('are you sure you want to delete this Subscribers?')" class="btn default btn-xs red">
                            <i class="fa fa-trash"></i>
                        </a></td>
                </tr>
                @endforeach
        </table>
    </div>
    <div class="col-md-12">
         <div class="btn-group" role="group">
            <?php
            $search_query = \Illuminate\Support\Facades\Input::except('page');
            $subscribers->appends($search_query);
            ?>
            {!! $subscribers->links()!!}
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
    <script type="text/javascript">
        $("#subform").click(function (e) {
            e.preventDefault();
            var files = $("#theexcel")[0].files[0];
            var name = files.name;
            var extention = name.substr((name.lastIndexOf('.') + 1));
            if (extention == "xls" || extention == "xlsx") {
                $("#importexcel").submit();
            } else {
                alert("Please upload only excel files");
            }
        });
    </script>
    @endsection
