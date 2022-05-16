<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $fillable =[
        'received_user_id','sent_user_id','message',
    ];

    protected $table ='notifications';

    public function sent_user()
    {
        return $this->belongsTo('App\User','sent_user_id'); 
    }

    
}
