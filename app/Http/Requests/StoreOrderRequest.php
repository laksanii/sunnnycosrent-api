<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email:dns',
            'telp_numb' => 'required|numeric|digits_between:8,15',
            'whatsapp' => 'required|numeric|digits_between:8,15',
            'instagram' => 'required',
            'address' => 'required',
            'family_number1' => 'required|numeric|digits_between:8,15',
            'family_number2' => 'required|numeric|digits_between:8,15',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'post_code' => 'required|numeric',
            'KTP_pict' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'KTP_selfie' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'payment_pict' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'costume_id' => 'required',
            'rent_date' => 'required',
            'ship_date' => 'required',
        ];
    }
}