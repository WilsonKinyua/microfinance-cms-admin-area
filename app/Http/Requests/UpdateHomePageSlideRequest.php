<?php

namespace App\Http\Requests;

use App\HomePageSlide;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHomePageSlideRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('home_page_slide_edit');
    }

    public function rules()
    {
        return [
            'caption' => [
                'string',
                'nullable',
            ],
        ];
    }
}
