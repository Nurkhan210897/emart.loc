<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use Sluggable;
    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function specifications(){
        return $this->hasMany('App\Models\ProductSpecification');
    }

    public function scopeWithSpecifications($query){
        return $query->with(['specifications'=>function($query){
                $query->with(['textValue','specification',
                        'listValue'=>function($query){
                            $query->with(['list']);
                        }
                ]);
        }]);
    }

}
