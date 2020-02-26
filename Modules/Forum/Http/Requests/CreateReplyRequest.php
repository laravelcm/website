<?php

namespace Modules\Forum\Http\Requests;

use App\Exceptions\ThrottleException;
use Illuminate\Foundation\Http\FormRequest;

class CreateReplyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required|spamfree',
        ];
    }

    /**
     * Determine if the current request is asking for JSON.
     *
     * @return bool
     */
    public function wantsJson()
    {
        return true;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     * @throws ThrottleException
     */
    protected function failedAuthorization()
    {
        throw new ThrottleException(
            'Vous avez répondu trop fréquemment. Patientez un moment.'
        );
    }
}
