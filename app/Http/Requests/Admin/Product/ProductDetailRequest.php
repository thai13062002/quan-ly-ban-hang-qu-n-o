<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductDetailRequest extends FormRequest
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
            'color_id' => ['required', 'string'],
            'size_id' => ['required', 'string'],
            'image' => ['image','file'],
            'quantity' =>['required', 'integer','min:0', 'max: 10000'],
        ];
    }
}
