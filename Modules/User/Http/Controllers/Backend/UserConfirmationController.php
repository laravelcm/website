<?php

namespace Modules\User\Http\Controllers\Backend;

use Modules\Core\Http\Controllers\Backend\BackendBaseController;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\ManageUserRequest;
use Modules\User\Notifications\UserNeedsConfirmation;
use Modules\User\Repositories\UserRepository;

/**
 * Class UserConfirmationController.
 */
class UserConfirmationController extends BackendBaseController
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function sendConfirmationEmail(ManageUserRequest $request, User $user)
    {
        // Shouldn't allow users to confirm their own accounts when the application is set to manual confirmation
        if (config('access.users.requires_approval')) {
            return redirect()->back()->withFlashDanger(__('user::alerts.backend.users.cant_resend_confirmation'));
        }

        if ($user->isConfirmed()) {
            return redirect()->back()->withFlashSuccess(__('user::exceptions.backend.access.users.already_confirmed'));
        }

        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        return redirect()->back()->withFlashSuccess(__('user::alerts.backend.users.confirmation_email'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User $user
     *
     * @return mixed
     * @throws \Modules\Core\Exceptions\GeneralException
     */
    public function confirm(ManageUserRequest $request, User $user)
    {
        $this->userRepository->confirm($user);

        return redirect()->route('admin.auth.user.index')
            ->withFlashSuccess(__('user::alerts.backend.users.confirmed'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User $user
     *
     * @return mixed
     * @throws \Modules\Core\Exceptions\GeneralException
     */
    public function unconfirm(ManageUserRequest $request, User $user)
    {
        $this->userRepository->unconfirm($user);

        return redirect()->route('admin.auth.user.index')
            ->withFlashSuccess(__('user::alerts.backend.users.unconfirmed'));
    }
}
