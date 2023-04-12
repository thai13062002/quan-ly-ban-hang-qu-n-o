<?php

namespace App\Http\Requests\Admin\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:' . config('validate.min.supplier.name'), 'unique:suppliers,name'],
            'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:' . config('validate.min.phone')],
            'email' => ['required', 'string', 'email', 'unique:suppliers,email', 'max:' . config('validate.max.email')],
            'address' => ['required', 'string', 'max:' . config('validate.min.address')]
        ];
    }
}
