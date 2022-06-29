<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class FrequentlyAskedQuestion extends Model
{
    public $timestamps=false;
    protected $guarded=[];
    protected $table='frequently_asked_questions';
}
