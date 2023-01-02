<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Facades\Validator;

final class Media implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $is_image = Validator::make(
            ['upload' => $value],
            ['upload' => 'image']
        )->passes();

        $is_video = Validator::make(
            ['upload' => $value],
            ['upload' => 'mimetypes:video/avi,video/mpeg,video/quicktime']
        )->passes();

        if (!$is_video && !$is_image) {
            $fail(':attribute must be image or video.');
        }

        if ($is_video) {
            $validator = Validator::make(
                ['video' => $value],
                ['video' => "max:1024000"]
            );
            if ($validator->fails()) {
                $fail(":attribute must be 100 megabytes or less.");
            }
        }

        if ($is_image) {
            $validator = Validator::make(
                ['image' => $value],
                ['image' => "max:10240"]
            );
            if ($validator->fails()) {
                $fail(":attribute must be 10 megabyte or less.");
            }
        }
    }
}
