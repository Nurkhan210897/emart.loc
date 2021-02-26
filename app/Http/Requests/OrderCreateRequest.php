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
            'address' => 'required',
            'commentToDelivery'=>'sometimes',
            'deliveryType' => 'required|integer',
            'paymentType' => 'required|integer'

        ];
    }

    public function messages()
    {
        return [
          'fName.required'=>'Введите имя!',
          'sName.required'=>'Введите фамилию!',
          'mobile.required'=>'Введите номер телефона!',
            'address.required' => 'Введите адресс!',
            'deliveryType.required' => 'Выберите "тип доставки!"',
            'deliveryType.integer' => 'Не верный формат "тип доставки"',
            'paymentType.required' => 'Выберите "тип оплаты"!',
            'paymentType.integer' => 'Не верный формат "тип оплаты"!',
        ];
    }

    public function authorize()
    {
        return true;
    }
}