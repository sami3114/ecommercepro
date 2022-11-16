<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title'=>'required|min:2|Max:15|string',
            'description',
            'stock'=>'required|numeric',
            'price'=>'required|numeric',
            'discount_price'=>'nullable|numeric',
            'is_active'=>'nullable|string|max:500',
        ];
    }
}
