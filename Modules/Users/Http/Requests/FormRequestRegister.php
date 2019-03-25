<?php

namespace TypiCMS\Modules\Users\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequestRegister extends AbstractFormRequest
{
    public function rules()
    {
        $rules = [
            'email' => 'required|email|max:255|unique:users',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'password' => 'required|min:6|max:255|confirmed',
        ];

        return $rules;
    }
}
