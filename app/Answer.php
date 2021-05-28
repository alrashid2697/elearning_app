<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'quiz_id',
        'lesson_id',
        'ur_answer'
    ];


    public function questionnaire()
    {
        return $this->hasMany('App\Questionnaire', 'id','quiz_id');
    }
    public function activity()
    {
        return $this->morphMany('App\Activity','notifiable');

    }
    public function lesson()
    {
        return $this->belongsTo('App\Lesson','lesson_id');
    }
}
