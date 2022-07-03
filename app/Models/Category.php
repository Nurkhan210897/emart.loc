<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    use Sluggable;

    /**
     * @var bool
     */
    public $timestamps=false;

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

    public function scopeWithSubCategories($query){
        return $query->with([
            'subCategories'=>function($query){
                return $query->orderBy('serial_number','ASC');
            }
        ]);
    }

    public function scopeWithFirstSubCategory($query){
        return $query->with([
            'subCategories'=>function($query){
                return $query->orderBy('serial_number','ASC')->limit(1);
            }
        ]);
    }

    public function scopeWithProducts($query){
        return $query->with([
            'products'=>function($query){
                return $query->orderBy('serial_number','ASC');
            }
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories(){
        return $this->hasMany('App\Models\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
