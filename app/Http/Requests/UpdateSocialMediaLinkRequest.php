<?php

namespace App\Http\Requests;

use App\SocialMediaLink;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSocialMediaLinkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('social_media_link_edit');
    }

    public function rules()
    {
        return [
            'facebook'  => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'phone'     => [
                'string',
                'min:5',
                'max:20',
                'nullable',
            ],
        ];
    }
}
