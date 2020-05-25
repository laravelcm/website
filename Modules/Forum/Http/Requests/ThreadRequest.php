<?php

namespace Modules\Forum\Http\Requests;

use Modules\Core\Http\Requests\AbstractBaseRequest;

class ThreadRequest extends AbstractBaseRequest
{
    /**
     * Rules for creating a new resource.
     *
     * @var array
     */
    public $storeRules = [
        'title' => 'required|spamfree',
        'body' => 'required',
        'channel_id' => 'required|exists:channels,id',
    ];

    /**
     * Rules for updating a resource.
     *
     * @var array
     */
    public $updateRules = [
        'title' => 'required|spamfree',
        'body' => 'required',
    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Le titre est requis',
            'body.required'  => 'Le contenu est requis',
            'channel_id.required'  => 'Le channel est requis',
        ];
    }
}
