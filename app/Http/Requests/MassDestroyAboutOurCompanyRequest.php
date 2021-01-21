<?php

namespace App\Http\Requests;

use App\AboutOurCompany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAboutOurCompanyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('about_our_company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:about_our_companies,id',
        ];
    }
}
