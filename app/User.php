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
        'fname','lname', 'email', 'password', 'role',
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

    protected $attributes = [
        'role' => 1,
    ];


    public function following()
    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followed_id');
    }

    public function is_following($id)
    {
        if($this->following()->where('followed_id', $id)->count() > 0)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function followed($id)
    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followed_id')->where('followed_id', '=', $id);
    }

    public function followers(){
        return $this->belongsToMany('App\User', 'follows', 'followed_id','follower_id');
    }

}
