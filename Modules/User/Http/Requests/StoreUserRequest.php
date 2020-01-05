<?php

namespace Modules\User\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:191', Rule::unique('users')],
            'password' => ['required', 'min:6', 'confirmed'],
            'roles' => ['required', 'array'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }
}
