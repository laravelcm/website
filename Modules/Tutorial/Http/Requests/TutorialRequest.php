<?php

namespace Modules\Tutorial\Http\Requests;

use Modules\Core\Http\Requests\AbstractBaseRequest;

class TutorialRequest extends AbstractBaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            return true;
        }

        return false;
    }

    /**
     * Return store rules.
     *
     * @return array
     */
    public function getStoreRules(): array
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'provider' => 'required',
            'provider_id' => 'required',
            'category_id' => 'required',
        ];
    }

    /**
     * Return update rules.
     *
     * @return array
     */
    public function getUpdateRules(): array
    {
        return [
            'title' => 'sometimes|required',
            'body' => 'sometimes|required',
            'provider' => 'sometimes|required',
            'provider_id' => 'sometimes|required',
            'category_id' => 'sometimes|required',
        ];
    }
}
