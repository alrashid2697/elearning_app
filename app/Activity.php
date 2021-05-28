<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    // protected $fillable = [
    //     'user_id',
    // ];
    protected $guarded = [];

    public function notifiable()
    {
        return $this->morphTo();
    }
    public function follow()
    {
        return $this->belongsTo('App\Follow','notifiable_id');
    }
    public function answer()
    {
        return $this->belongsTo('App\Answer','notifiable_id');
    }


}
