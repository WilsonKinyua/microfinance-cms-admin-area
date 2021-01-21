<?php

namespace App\Http\Requests;

use App\SocialMediaLink;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySocialMediaLinkRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('social_media_link_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:social_media_links,id',
        ];
    }
}
