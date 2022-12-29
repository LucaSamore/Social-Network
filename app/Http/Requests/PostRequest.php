<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'textual_content' => 'max:255',
            'photoPath' => 'max:500',
            'videoPath' => 'max:500',
        ];
    }
}
