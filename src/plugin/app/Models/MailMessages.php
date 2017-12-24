<?php

namespace App\Models;

class MailMessages extends BaseModel {

    public $table = 'mail_messages';
    public $timestamps=false;
    protected $guarded=['id'];
    public $rules=[
        'subject'=>'required',
        'content'=>'required'
    ];

    function track(){
        return $this->hasMany('App\Models\MailTrack','message_id');
    }
	
}
