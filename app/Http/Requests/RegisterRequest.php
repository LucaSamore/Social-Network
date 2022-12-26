<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

final class RegisterRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

    /**
     * The route that users should be redirected to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'register';


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
            'password' => ['required', Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
            'date_of_birth' => ['required', 'date'],
            'bio' => ['string', 'nullable'],
            'profile_image' => ['string', 'nullable'],
            'banner_image' => ['string', 'nullable'],
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
            'name.required' => 'Questo campo è obbligatorio',
            'surname.required' => 'Questo campo è obbligatorio',
            'username.required' => 'Questo campo è obbligatorio',
            'username.unique:users,username' => 'Username già in uso',
            'email.required' => 'Questo campo è obbligatorio',
            'email.unique:users,email' => 'Email già in uso',
            'password.required' => 'Questo campo è obbligatorio',
            'email.email' => 'Il contenuto non è una email valida',
            'date_of_birth.required' => 'Questo campo è obbligatorio',
            'date_of_birth.date' => 'La data inserita non è valida',
        ];
    }
}
