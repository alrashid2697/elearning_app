<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    //
    protected $fillable = [
        'question',
        'category_id',
        'choice_1',
        'choice_2',
        'choice_3',
        'choice_4',
        'answer'
    ];

    public function quiz()
    {
        return $this->belongsTo('App\Category');
    }

    public function results()
    {
        return $this->belongsTo('App\Answer');
    }



}
