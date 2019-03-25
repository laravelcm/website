<?php

namespace TypiCMS\Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mckenziearts\LaravelOAuth\Traits\OAuthSocialite;
use TypiCMS\Modules\Users\Models\User;

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

    use AuthenticatesUsers, OAuthSocialite;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('users::login');
    }

    /**
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $credentials = $this->credentials($request);

        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            $error = 'Cet utilisateur n’a pas été trouvé.';
        } elseif (!$user->activated) {
            $error = 'Cet utilisateur n’a pas été activé.';
        } else {
            $error = 'Le mot de passe est incorrect.';
        }

        $errors = [$this->username() => $error];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['activated'] = 1;

        return $credentials;
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
        $userId = DB::table(config('laravel-oauth.users.table'))->insertGetId([
            'first_name'  => $user->getName(),
            'email'       => $user->getEmail(),
            'password'    => bcrypt('password'),
            'api_token'   => Str::uuid(),
            'activated'   => 1,
            $provider.'_id' => $user->getId(),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        return $userId;
    }
}
