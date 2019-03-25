<?php

namespace TypiCMS\Modules\Pages\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class PageSectionFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'slug.*' => 'nullable|alpha_dash|max:255',
            'title.*' => 'nullable|max:255',
        ];
    }
}
