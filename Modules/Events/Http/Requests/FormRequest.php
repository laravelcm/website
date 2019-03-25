<?php

namespace TypiCMS\Modules\Events\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'start_date' => 'required|date_format:Y-m-d G:i:s',
            'end_date' => 'required|date_format:Y-m-d G:i:s',
            'image_id' => 'nullable|integer',
            'slug.*' => 'nullable|alpha_dash|max:255',
            'title.*' => 'nullable|max:255',
            'venue.*' => 'nullable|max:255',
        ];
    }
}
