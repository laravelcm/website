<?php

namespace Modules\User\Http\Requests\Frontend;

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
            'username' => [
                'required',
                'max:50',
                Rule::unique('users')->ignore(request()->user()->id),
            ],
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

    public function messages()
    {
        return [
          'username.required' => 'Votre pseudo est requis',
          'username.unique' => 'Ce pseudo est déjà utilisé',
        ];
    }
}
