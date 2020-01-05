<?php

namespace Modules\User\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Modules\User\Http\Requests\Frontend\UpdateProfileRequest;
use Modules\User\Repositories\Frontend\UserRepository;

class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * ProfileController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @return mixed
     * @throws \Modules\Core\Exceptions\GeneralException
     */
    public function update(UpdateProfileRequest $request)
    {
        $output = $this->userRepository->update(
            $request->user()->id,
            $request->only('first_name', 'last_name', 'email', 'avatar_type', 'avatar_location'),
            $request->has('avatar_location') ? $request->file('avatar_location') : false
        );

        // E-mail address was updated, user has to reconfirm
        if (is_array($output) && $output['email_changed']) {
            auth()->logout();

            return redirect()->route('frontend.auth.login')
                ->withFlashInfo(__('strings.frontend.user.email_changed_notice'));
        }

        return redirect()->route('frontend.user.account')
            ->withFlashSuccess(__('strings.frontend.user.profile_updated'));
    }
}
