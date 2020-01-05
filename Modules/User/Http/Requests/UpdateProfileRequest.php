<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\User\Helpers\SocialiteHelper;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'max:191'],
            'last_name' => ['required', 'max:191'],
            'email' => ['sometimes', 'email', 'max:191'],
            'avatar_type' => ['required', 'max:191', Rule::in(array_merge(['gravatar', 'storage'], (new SocialiteHelper)->getAcceptedProviders()))],
            'avatar_location' => ['sometimes', 'image', 'max:191'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
