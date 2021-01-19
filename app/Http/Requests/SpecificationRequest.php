<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecificationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=>'required|string'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
