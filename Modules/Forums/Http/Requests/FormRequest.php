<?php

namespace TypiCMS\Modules\Forums\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'name'  => 'required|max:255',
            'color' => 'required|max:255',
            'slug'  => 'required|alpha_dash|max:255',
        ];
    }
}
