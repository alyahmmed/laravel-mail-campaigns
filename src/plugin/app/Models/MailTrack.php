<?php

namespace App\Models;

class MailTrack extends BaseModel {

    public $table = 'mail_track';
    public $timestamps=false;
    protected $guarded=['id'];
    public $rules=[
        'email_id'=>'required',
        'message_id'=>'required'
    ]; 
    
    
	
}
