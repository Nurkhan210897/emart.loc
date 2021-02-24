<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'fName'=>'required',
            'sName'=>'required',
            'mobile'=>'required',
            'address'=>'required'

        ];
    }

    public function messages()
    {
        return [
          'fName.required'=>'Введите имя!',
          'sName.required'=>'Введите фамилию!',
          'mobile.required'=>'Введите номер телефона!',
          'address.required'=>'Введите адресс!'
        ];
    }

    public function authorize()
    {
        return true;
    }
}