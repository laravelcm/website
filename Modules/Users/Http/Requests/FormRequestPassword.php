<?php

namespace TypiCMS\Modules\Users\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequestPassword extends AbstractFormRequest
{
    public function rules()
    {
        $rules = [
            'token' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|max:255',
        ];

        return $rules;
    }
}
