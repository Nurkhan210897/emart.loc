<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function handle(Request $request)
    {
        Call::create([
            'mobile' => $request->mobile,
            'status' => 1
        ]);
        return response()->json([],201);
    }
}