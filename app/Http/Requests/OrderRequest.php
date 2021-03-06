<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required|string|min:3',
          'address' => 'required|string|min:3',
          'shipping_option' => 'required|string',
          'card_no' => 'required',
          'ccExpiryMonth' => 'required',
          'ccExpiryYear' => 'required',
          'cvvNumber' => 'required',
        ];
    }
}
