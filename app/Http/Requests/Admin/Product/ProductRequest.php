<?php

namespace App\Http\Requests\Admin\Product;

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
            'name_product' => ['required', 'string', 'max:50'],
            'image' => [ 'image', 'file'],
            'supplier_id' => ['required'],
            'category_id' => ['required'],
            'description' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string'],
            'price' => ['required', 'integer','min:0', 'max: 100000000000000'],
        ];
    }
}
