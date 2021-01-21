<?php

namespace App\Http\Requests;

use App\HomePageSlide;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHomePageSlideRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('home_page_slide_create');
    }

    public function rules()
    {
        return [
            'caption'     => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'photo'       => [
                'required',
            ],
        ];
    }
}
