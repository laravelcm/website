<?php

namespace Modules\User\Http\Controllers\Backend;

use Modules\Core\Http\Controllers\Backend\BackendBaseController;
use Modules\Core\Exceptions\GeneralException;
use Modules\User\Entities\User;
use Modules\User\Helpers\AuthHelper;
use Modules\User\Http\Requests\ManageUserRequest;

class UserAccessController extends BackendBaseController
{
    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @throws GeneralException
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginAs(ManageUserRequest $request, User $user)
    {
        // Overwrite who we're logging in as, if we're already logged in as someone else.
        if (session()->has('admin_user_id') && session()->has('temp_user_id')) {
            // Let's not try to login as ourselves.
            if ($request->user()->id === $user->id || (int) session()->get('admin_user_id') === $user->id) {
                throw new GeneralException('Do not try to login as yourself.');
            }

            // Overwrite temp user ID.
            session(['temp_user_id' => $user->id]);

            // Login.
            auth()->loginUsingId($user->id);

            // Redirect.
            return redirect()->route(home_route());
        }

        resolve(AuthHelper::class)->flushTempSession();

        // Won't break, but don't let them "Login As" themselves
        if ($request->user()->id === $user->id) {
            throw new GeneralException('Do not try to login as yourself.');
        }

        // Add new session variables
        session(['admin_user_id' => $request->user()->id]);
        session(['admin_user_name' => $request->user()->full_name]);
        session(['temp_user_id' => $user->id]);

        // Login user
        auth()->loginUsingId($user->id);

        // Redirect to frontend
        return redirect()->route(home_route());
    }
}
