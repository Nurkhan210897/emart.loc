<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ProductSpecificationListValue extends Model
{
    protected $guarded=[];
    public $timestamps=false;

    public function list(){
        return $this->belongsTo('App\Models\ListValue','list_value_id');
    }
}
