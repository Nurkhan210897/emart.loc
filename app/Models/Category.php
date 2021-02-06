<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    public $timestamps=false;

    public function subCategories(){
        return $this->hasMany('App\Models\SubCategory');
    }
}
