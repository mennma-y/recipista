<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipi extends Model
{
    //
    protected $fillable=[
        'recipi_name','category','body','img_url',
    ];

    protected $hidden = [
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'likes','recipi_id','user_id')->withTimestamps();
    }
}
