<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class VideoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'video' => ['required', 'mimetypes:video/avi,video/mpeg,video/quicktime', 'max:100240'] // Max video size is 100MB
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
            'video.required' => 'Questo campo &egrave; obbligatorio',
            'video.mimetypes:video/avi,video/mpeg,video/quicktime' => 'Il file non &egrave; un video',
            'image.max:100240' => 'Il file &grave; troppo grande'
        ];
    }
}
