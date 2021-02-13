<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ProductSpecification extends Model
{
    protected $guarded=[];
    public $timestamps=false;

    public function listValue(){
        return $this->hasOne('App\Models\ProductSpecificationListValue');
    }

    public function textValue(){
        return $this->hasOne('App\Models\ProductSpecificationTextValue');
    }

    public function lists(){
        return $this->hasMany('App\Models\ListValue','specification_id','specification_id');
    }

    public function specification(){
        return $this->belongsTo('App\Models\Specification');
    }
}
