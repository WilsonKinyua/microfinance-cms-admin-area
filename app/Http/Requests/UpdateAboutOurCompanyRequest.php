<?php

namespace App\Http\Requests;

use App\AboutOurCompany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAboutOurCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('about_our_company_edit');
    }

    public function rules()
    {
        return [
            'title'       => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
