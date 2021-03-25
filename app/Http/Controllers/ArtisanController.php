<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function runCommands()
    {
        Artisan::call('storage:link');
        Artisan::call('view:cache');
        Artisan::call('config:cache');
    }
}