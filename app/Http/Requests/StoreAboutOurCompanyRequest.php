<?php

namespace App\Http\Requests;

use App\AboutOurCompany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAboutOurCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('about_our_company_create');
    }

    public function rules()
    {
        return [
            'description' => [
                'required',
            ],
            'photo'       => [
                'required',
            ],
        ];
    }
}
