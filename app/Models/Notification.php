<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{
    public $timestamps=false;

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            Notification::where('id','>',0)->delete();
        });
    }
}
