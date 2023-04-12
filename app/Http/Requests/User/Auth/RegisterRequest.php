<?php

namespace App\Http\Requests\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'min:' . config('validate.min.user.name'), 'string', 'max:' . config('validate.max.name')],
            'email' => ['required', 'email', 'min:' . config('validate.min.email'), 'string', 'unique:users', 'max:' . config('validate.max.email')],
            'password' => ['required', 'string', 'min:' . config('validate.min.password'), 'max:' . config('validate.max.password')],
            'confirm_password' => ['required', 'string', 'same:password']
        ];
    }
}
