<?php

namespace Modules\User\Http\Requests;

use DivineOmega\LaravelPasswordExposedValidationRule\PasswordExposed;
use Illuminate\Foundation\Http\FormRequest;
use Modules\User\Rules\ChangePassword;
use Modules\User\Rules\UnusedPassword;

class UpdateUserPasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => [
                'required',
                'confirmed',
                new ChangePassword(),
                new PasswordExposed(),
                new UnusedPassword((int) $this->segment(4)),
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
        return $this->user()->isAdmin();
    }
}
