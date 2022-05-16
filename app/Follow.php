<?php

namespace App;

use Illuminate\Database\Eloquent\Model;  

class Follow extends Model
{
    //
    protected $fillable = ['follow_user_id', 'followed_user_id'];

    protected $table = 'follows';
    

    public function getFollowCount($user_id)
    {
        return $this->where('follow_user_id', $user_id)->count();
    }

    public function getFollowerCount($user_id)
    {
        return $this->where('followed_user_id', $user_id)->count();
    }

    

}
