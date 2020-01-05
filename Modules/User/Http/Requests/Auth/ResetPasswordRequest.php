<?php

namespace Modules\User\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use DivineOmega\LaravelPasswordExposedValidationRule\PasswordExposed;
use Modules\User\Rules\ChangePassword;
use Modules\User\Rules\UnusedPassword;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => [
                'required',
                'confirmed',
                new ChangePassword(),
                new PasswordExposed(),
                new UnusedPassword($this->get('token')),
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
}
