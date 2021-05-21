<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answerkey extends Model
{
    protected $fillable = [
        'quiz_id',
        'category_id',
        'correct_answer',
    ];
}
