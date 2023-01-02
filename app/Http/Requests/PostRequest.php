<?php

namespace App\Http\Requests;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

final class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'textual_content' => ['string', 'size:1500'],
            'file-upload' => [new Media]
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
            'textual_content.size' => 'Il contenuto è troppo lungo',
            'textual_content.string' => 'Il contenuto non è valido',
        ];
    }
}
