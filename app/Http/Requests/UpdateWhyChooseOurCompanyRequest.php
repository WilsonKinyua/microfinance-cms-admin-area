<?php

namespace App\Http\Requests;

use App\WhyChooseOurCompany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWhyChooseOurCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('why_choose_our_company_edit');
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
