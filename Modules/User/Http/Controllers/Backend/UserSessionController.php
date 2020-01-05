<?php

namespace Modules\User\Http\Controllers\Backend;

use Modules\Core\Http\Controllers\Backend\BackendBaseController;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\ManageUserRequest;

class UserSessionController extends BackendBaseController
{
    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function clearSession(ManageUserRequest $request, User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.users.cant_delete_own_session'));
        }

        $user->update(['to_be_logged_out' => true]);

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.session_cleared'));
    }
}
