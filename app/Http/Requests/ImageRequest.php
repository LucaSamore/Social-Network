<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class ImageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => ['required', 'image', 'max:10240'] // Max image size is 10MB
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
            'image.required' => 'Questo campo &egrave; obbligatorio',
            'image.image' => 'Il file non &egrave; una immagine',
            'image.max:10240' => 'Il file &grave; troppo grande'
        ];
    }
}
