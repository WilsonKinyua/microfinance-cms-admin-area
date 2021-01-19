<?php

namespace App\Http\Requests;

use App\Contact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_create');
    }

    public function rules()
    {
        return [
            'street_name' => [
                'string',
                'nullable',
            ],
            'phone'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'open_time'   => [
                'string',
                'nullable',
            ],
        ];
    }
}
