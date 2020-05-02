<?php

namespace Modules\User\Http\Controllers\Backend;

use Modules\Core\Http\Controllers\Backend\BackendBaseController;
use Modules\User\Entities\SocialAccount;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\ManageUserRequest;
use Modules\User\Repositories\SocialRepository;

/**
 * Class UserSocialController.
 */
class UserSocialController extends BackendBaseController
{
    /**
     * @param ManageUserRequest $request
     * @param SocialRepository $socialRepository
     * @param User $user
     * @param SocialAccount $social
     *
     * @return mixed
     * @throws \Modules\Core\Exceptions\GeneralException
     */
    public function unlink(ManageUserRequest $request, SocialRepository $socialRepository, User $user, SocialAccount $social)
    {
        $socialRepository->delete($user, $social);

        return redirect()->back()->withFlashSuccess(__('user::alerts.backend.users.social_deleted'));
    }
}
