<?php

namespace TypiCMS\Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use TypiCMS\Modules\Users\Http\Requests\FormRequestRegister;
use TypiCMS\Modules\Users\Models\User;
use TypiCMS\Modules\Users\Notifications\UserRegistered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('users::register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \TypiCMS\Modules\Users\Http\Requests\FormRequestRegister $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(FormRequestRegister $request)
    {
        $user = $this->create($request->all());

        event(new Registered($user));

        $user->notify(new UserRegistered($user));

        return redirect()
            ->back()
            ->with('status', __('Your account has been created, check your email for the activation link'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Confirm a user’s email address.
     *
     * @param string $token
     *
     * @return mixed
     */
    public function activate($token)
    {
        $user = User::where('token', $token)->firstOrFail();

        $user->activate();

        return redirect()
            ->route('login')
            ->with('status', __('Your account has been activated, you can now log in'));
    }
}
