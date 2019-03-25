<?php

namespace TypiCMS\Modules\Users\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    public function rules()
    {
        $rules = [
            'email' => 'required|email|max:255|unique:users,email,'.$this->id,
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'password' => 'nullable|min:8|max:255|confirmed',
        ];

        return $rules;
    }
}
