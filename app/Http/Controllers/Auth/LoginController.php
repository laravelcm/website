<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Carbon;
use Socialite;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/forums';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        $provider = strtolower($provider);

        if ($provider === 'facebook') {
            return Socialite::driver('facebook')->with(['auth_type' => 'rerequest'])->redirect();
        }

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();

        // Check if user email is null
        // Get user from the database with the good provider_id or email
        if (is_null($providerUser->getEmail())) {
            $this->redirectToProvider($provider);
        }

        $user = User::where($provider.'_id', '=', $providerUser->getId())
            ->orWhere('email', '=', $providerUser->getEmail())
            ->first();

        if (is_null($user)) {
            // Save user to the database
            $userId = $this->registerUser($provider, $providerUser);
            Auth::loginUsingId($userId);

            return redirect()->intended($this->redirectPath());
        }

        // Login user
        Auth::loginUsingId($user->id);

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Resgiter user to the database and return ID.
     *
     * @param $provider
     * @param $user
     * @return int
     */
    public function registerUser($provider, $user)
    {
        $user = User::create([
            'name'  => $user->getName(),
            'email' => $user->getEmail(),
            'password'  => bcrypt('password'),
            $provider.'_id'    => $user->getId(),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        return $user->id;
    }
}
