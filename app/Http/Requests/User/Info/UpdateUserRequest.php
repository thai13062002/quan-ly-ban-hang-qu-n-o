<?php

namespace App\Http\Requests\User\Info;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:' . config('validate.min.user.name')],
            'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:' . config('validate.min.phone'), 'max:' . config('validate.max.phone')],
            'email' => ['required', 'string', 'email', 'unique:suppliers,email,' . $this->email . ',email', 'max:' . config('validate.max.email')],
            'provinces' => ['required'],
            'districts' => ['required'],
            'wards' => ['required'],
        ];
    }
}
