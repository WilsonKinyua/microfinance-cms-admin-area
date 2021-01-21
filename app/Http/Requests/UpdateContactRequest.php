<?php

namespace App\Http\Requests;

use App\Contact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContactRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_edit');
    }

    public function rules()
    {
        return [
            'street_name' => [
                'string',
                'nullable',
            ],
            'phone'       => [
                'string',
                'min:5',
                'max:15',
                'required',
            ],
            'open_time'   => [
                'string',
                'nullable',
            ],
            'email'       => [
                'required',
            ],
        ];
    }
}
