<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'follower_id',
        'followed_id'
    ];

    public function activity()
    {
        return $this->morphMany('App\Activity','notifiable');

    }
    public function followUser()
    {
        return $this->belongsTo('App\User','followed_id');
    }
}
