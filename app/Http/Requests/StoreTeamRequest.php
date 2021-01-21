<?php

namespace App\Http\Requests;

use App\Team;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_create');
    }

    public function rules()
    {
        return [
            'full_name'       => [
                'string',
                'required',
            ],
            'professionalism' => [
                'string',
                'required',
            ],
            'facebook'        => [
                'string',
                'nullable',
            ],
            'twitter'         => [
                'string',
                'nullable',
            ],
            'website'         => [
                'string',
                'nullable',
            ],
            'instagram'       => [
                'string',
                'nullable',
            ],
        ];
    }
}
