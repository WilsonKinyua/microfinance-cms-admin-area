<?php

namespace App\Http\Requests;

use App\WhyChooseOurCompany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyWhyChooseOurCompanyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('why_choose_our_company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:why_choose_our_companies,id',
        ];
    }
}
