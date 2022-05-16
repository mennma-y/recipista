<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','img_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function recipi()
    {
        return $this->hasMany('App\Recipi');
    }

    public function follows()
    {
        return $this->belongsToMany(User::class,'follows','follow_user_id','followed_user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class,'follows','followed_user_id','follow_user_id');
    }

    public function follow($user_id)
    {
        
        return $this->follows()->attach($user_id); 
    }

    public function unfollow($user_id)
    {
        return $this->follows()->detach($user_id);
    }

    //このユーザーをフォローをしているかしていないかの確認
    public function isfollow($user_id)
    {
        return $this->follows()->where('followed_user_id',$user_id)->exists();  
    }

    public function favorites()
    {
        return $this->belongsToMany('App\Recipi')->withTimestamps();
    }

    //javascript用のdeta-follow_id
    public function follow_id()
    {
        $user_id = Auth::user()->id;
        $follow = Follow::where('follow_user_id',$user_id)->where('followed_user_id',$this->id)->first();

        if(!empty($follow)){
            return $follow->id;
        }
        return null;  
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification','');
    }


}
