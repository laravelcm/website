<?php

namespace Modules\User\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Modules\User\Http\Requests\Frontend\UpdatePasswordRequest;
use Modules\User\Repositories\Frontend\UserRepository;

/**
 * Class PasswordExpiredController.
 */
class PasswordExpiredController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function expired()
    {
        abort_unless(config('project.users.password_expires_days'), 404);

        return view('user::frontend.auth.passwords.expired');
    }

    /**
     * @param UpdatePasswordRequest $request
     * @param UserRepository $userRepository
     *
     * @return mixed
     * @throws \Modules\Core\Exceptions\GeneralException
     */
    public function update(UpdatePasswordRequest $request, UserRepository $userRepository)
    {
        abort_unless(config('project.users.password_expires_days'), 404);

        $userRepository->updatePassword($request->only('old_password', 'password'), true);

        return redirect()->route('frontend.user.account')
            ->withFlashSuccess(__('strings.frontend.user.password_updated'));
    }
}
