<?php

namespace Modules\User\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Modules\User\Http\Requests\Frontend\UpdatePasswordRequest;
use Modules\User\Repositories\Frontend\UserRepository;

class UpdatePasswordController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * ChangePasswordController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UpdatePasswordRequest $request
     *
     * @throws \Modules\Core\Exceptions\GeneralException
     * @return mixed
     */
    public function update(UpdatePasswordRequest $request)
    {
        $this->userRepository->updatePassword($request->only('old_password', 'password'));

        return redirect()->route('frontend.user.account')
            ->withFlashSuccess(__('strings.frontend.user.password_updated'));
    }
}
