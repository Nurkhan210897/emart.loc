<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Specification extends Model
{
    public $timestamps=false;
    protected $guarded=[];

    public function listValues(){
        return $this->hasMany('App\Models\ListValue');
    }
}
