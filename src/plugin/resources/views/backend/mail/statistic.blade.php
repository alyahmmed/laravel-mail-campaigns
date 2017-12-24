@extends(config("mailMessages.backend_layout"))

@section('content')
<div class="page-title">
	<h1 style="text-align: center">Mails Statistics</h1>


	<ul class="breadcrumb">
		<li><a href="<?php echo route('mail.messages'); ?>">messages</a></li>
	</ul>
</div>
<div class="wrapper wrapper-white">
    
    <div class="row">
            <div class="col-md-4">
                <a href="#" class="tile tile-info">
                        <span>{{$message->sent_count}}</span> <p>Sent mails count</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="tile tile-warning">
                        <span>{{$opend_count}}</span> <p>Opened mails count</p>
                </a>
            </div>
<!--        <div class="col-md-4">
                <a href="#" class="tile tile-danger">
                        <span>{{$message->clicked}}</span> <p>Clicked mails count</p>
                </a>
            </div>
        <div class="col-md-4">
                <a href="#" class="tile tile-success">
                        <span>{{$message->registered}}</span> <p>Registered mails count</p>
                </a>
            </div>-->
    </div>
</div>


    
@stop


@section('js')
    <script>
        $(document).ready(function(){
            var name,header,footer;
               
           $('#add').click(function(e){
               e.preventDefault();
               var level=$(this).attr('data-level');
               if(level==='name'){
                  // name=$('#name').val();
                   $('#theme_name').hide();
                   $('#theme_header').show();
                   $(this).attr('data-level','header');
                   
               }else if(level==='header'){
                   //header=$('#header').val();
                   $('#theme_header').hide();
                   $('#theme_footer').show();
                   $(this).attr('data-level','footer');
                   $(this).attr('type','submit');
                   $(this).html('complete');
               }else if(level==='footer'){
                   $('#add-theme').submit();
               }
           }); 
        });
    </script>
    
    <?=  App\Http\Controllers\Helpers\Html\Froala\FroalaEditor::init_js()?>
@stop

