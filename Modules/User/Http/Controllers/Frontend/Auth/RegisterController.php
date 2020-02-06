<?php

namespace Modules\User\Http\Controllers\Frontend\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\User\Events\Frontend\UserRegistered;
use Modules\User\Helpers\SocialiteHelper;
use Modules\User\Http\Requests\Auth\RegisterRequest;
use Modules\User\Repositories\Frontend\UserRepository;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(home_route());
    }

    /**
     * Show the application registration form.
     *
     * @return \Inertia\Response
     */
    public function showRegistrationForm()
    {
        abort_unless(config('project.registration'), 404);

        return Inertia::render('auth/Register');
    }

    /**
     * @param RegisterRequest $request
     *
     * @throws \Throwable
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(RegisterRequest $request)
    {
        abort_unless(config('project.registration'), 404);

        $user = $this->userRepository->create($request->only('first_name', 'last_name', 'username', 'email', 'password'));

        // If the user must confirm their email or their account requires approval,
        // create the account but don't log them in.
        if (config('project.users.confirm_email') || config('project.users.requires_approval')) {
            event(new UserRegistered($user));

            return redirect($this->redirectPath())->withFlashSuccess(
                config('project.users.requires_approval') ?
                    __('exceptions.frontend.auth.confirmation.created_pending') :
                    __('exceptions.frontend.auth.confirmation.created_confirm')
            );
        }

        auth()->login($user);

        event(new UserRegistered($user));

        return redirect($this->redirectPath());
    }
}
