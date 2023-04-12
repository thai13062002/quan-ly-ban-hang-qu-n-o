<?php

namespace App\Http\Requests\Admin\Newsletter;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
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
            'title_newsletter' => ['required', 'string', 'max:50'],
            'content_newsletter' => ['required', 'string', 'max:255'],
        ];
    }
}
