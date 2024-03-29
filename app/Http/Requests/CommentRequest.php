<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class CommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'post_id' => ['uuid'],
            'textual_content' => ['string', 'max:500']
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
            'textual_content.string' => 'Il contenuto non è valido',
            'textual_content.max:500' => 'Il commento è troppo lungo'
        ];
    }
}
