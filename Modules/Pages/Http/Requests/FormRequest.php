<?php

namespace TypiCMS\Modules\Pages\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'template' => 'nullable|alpha_dash|max:255',
            'image_id' => 'nullable|integer',
            'module' => 'nullable|max:255',
            'slug.*' => 'nullable|alpha_dash|max:255',
            'title.*' => 'nullable|max:255',
            'meta_keywords.*' => 'nullable|max:255',
            'meta_description.*' => 'nullable|max:255',
        ];
    }
}
