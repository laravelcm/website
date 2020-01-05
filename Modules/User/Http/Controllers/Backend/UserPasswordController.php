<?php

namespace Modules\User\Http\Controllers\Backend;

use Modules\Core\Http\Controllers\Backend\BackendBaseController;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\ManageUserRequest;
use Modules\User\Http\Requests\UpdateUserPasswordRequest;
use Modules\User\Repositories\UserRepository;

class UserPasswordController extends BackendBaseController
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
    public function edit(ManageUserRequest $request, User $user)
    {
        return view('user::backend.user.change-password')
            ->withUser($user);
    }

    /**
     * @param UpdateUserPasswordRequest $request
     * @param User $user
     *
     * @return mixed
     * @throws \Modules\Core\Exceptions\GeneralException
     */
    public function update(UpdateUserPasswordRequest $request, User $user)
    {
        $this->userRepository->updatePassword($user, $request->only('password'));

        return redirect()->route('admin.auth.user.index')
            ->withFlashSuccess(__('user::alerts.backend.users.updated_password'));
    }
}
