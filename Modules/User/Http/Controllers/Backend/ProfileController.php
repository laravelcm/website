<?php

namespace Modules\User\Http\Controllers\Backend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\Frontend\UpdatePasswordRequest;
use Modules\User\Http\Requests\UpdateProfileRequest;
use Modules\User\Repositories\UserRepository;

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
     * Display a listing of the resource.
     *
     * @param  string $section
     * @return Response
     */
    public function index(string $section = '')
    {
        if (empty($section)) {
            notify()->success(__('strings.frontend.user.password_updated'));

            return redirect(route('admin.auth.profile.index', 'profile'));
        } else {
            return view('user::backend.user.profile')
                ->withSection($section);
        }
    }

    /**
     * Update User current password
     *
     * @param UpdatePasswordRequest $request
     * @throws \Modules\Core\Exceptions\GeneralException
     * @return mixed
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $this->userRepository->updateCurrentPassword($request->only('old_password', 'password'));

        notify()->success(__('strings.frontend.user.password_updated'));

        return redirect()->route('admin.auth.profile.index', 'change-password');
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @return mixed
     * @throws \Modules\Core\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateProfileRequest $request)
    {
        $output = $this->userRepository->updateProfile(
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

        return redirect()->route('admin.auth.profile.index')
            ->withFlashSuccess(__('strings.frontend.user.profile_updated'));
    }
}
