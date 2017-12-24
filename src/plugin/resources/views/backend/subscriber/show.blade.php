@extends(config("mailMessages.backend_layout"))

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2>Show Subscriber</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('backend/dashboard')}}">Dashboard</a>
            </li>
            <li>
                <a href="{{route('subscribers.index')}}">{{trans('subscribers.subscriber')}}</a>
            </li>
            <li class="active">
                <strong>Show Subscriber</strong>
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

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th>{{trans('subscribers.fields')}}</th>

                                            <th>{{trans('subscribers.desc')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>
                                                {{trans('subscribers.name')}}
                                            </td>

                                            <td>   {{$subscribe->name}}
                                                   </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                {{trans('subscribers.email')}}
                                            </td>

                                            <td>   {{$subscribe->email}}
                                                   </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                {{trans('subscribers.phone')}}
                                            </td>


                                            <td> {{$subscribe->phone}}
                                                   </td>
                                        </tr>
                                         <tr>

                                            <td>
                                                {{trans('subscribers.company')}}
                                            </td>


                                            <td> {{$subscribe->company}}
                                                   </td>
                                        </tr>
                                         <tr>

                                            <td>
                                                {{trans('subscribers.country')}}
                                            </td>


                                            <td> {{$subscribe->country}}
                                                   </td>
                                        </tr>
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
@endsection
