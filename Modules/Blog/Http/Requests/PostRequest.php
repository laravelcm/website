<?php

namespace Modules\Blog\Http\Requests;

use Modules\Core\Http\Requests\AbstractBaseRequest;

class PostRequest extends AbstractBaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Return store rules.
     *
     * @return array
     */
    public function getStoreRules() : array
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ];
    }

    /**
     * Return update rules.
     *
     * @return array
     */
    public function getUpdateRules() : array
    {
        return [
            'title' => 'sometimes|required|max:50',
            'body' => 'sometimes|required',
            'category_id' => 'sometimes|required'
        ];
    }
}
