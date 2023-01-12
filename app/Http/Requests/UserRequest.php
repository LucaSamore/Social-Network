<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

final class UserRequest extends FormRequest
{
    /**
     * The route that users should be redirected to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'settings';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'required'],
            'surname' => ['string', 'required'],
            'username' => ['string', 'required'],
            'email' => ['email', 'required'],
            'password' => ['confirmed', Password::min(8)->letters()->numbers()->mixedCase()->symbols(), 'required'],
            'password_confirmation' => [Password::min(8)->letters()->numbers()->mixedCase()->symbols(), 'required'],
            'date_of_birth' => ['date', 'before:01/01/2009', 'required'],
            'bio' => ['string', 'nullable'],
            'profile_image' => ['nullable', 'image', 'max:10240'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.unique:users,username' => 'Username già in uso',
            'email.unique:users,email' => 'Email già in uso',
            'password.confirmed' => 'Le due password non coincidono',
            'email.email' => 'Il contenuto non è una email valida',
            'date_of_birth.date' => 'La data inserita non è valida',
            'date_of_birth.before:01/01/2009' => 'Sei troppo giovane per iscriverti',
            'profile_image.image' => 'File non accettabile',
            'profile_image.max:10240' => 'Immagine troppo grande',
        ];
    }
}
