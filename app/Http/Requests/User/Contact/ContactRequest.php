<?php

namespace App\Http\Requests\User\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'content' => ['required', 'min:' . config('validate.min.contact')]
        ];
    }
}
