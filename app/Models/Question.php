<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
     /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'question',
       'answer',
       'option_a',
       'option_b',
       'option_c',
       'option_d',
       'correct_answer',
   ];
}