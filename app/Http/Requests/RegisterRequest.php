<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'username' => ['required', 'string', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
            'date_of_birth' => ['required', 'date'],
            'bio' => ['string', 'nullable'],
            'profile_image' => ['string', 'nullable'],
            'banner_image' => ['string', 'nullable'],
        ];
    }
}
