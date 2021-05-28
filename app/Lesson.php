<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function answers()
    {
        return $this->hasMany('App\Answer', 'lesson_id');
    }
    public function result()
    {
        return $this->hasMany('App\Questionnaire');

    }
    public function activities()
    {
        return $this->hasMany('App\Activity', 'id');
    }


}
