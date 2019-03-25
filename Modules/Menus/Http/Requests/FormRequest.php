<?php

namespace TypiCMS\Modules\Menus\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255|alpha_dash|unique:menus,name,'.$this->id,
        ];
    }
}
