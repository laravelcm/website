<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * User Profile
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account()
    {
        return view('frontend.users.account');
    }

    /**
     * Update User account
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAccount(Request $request, int $id)
    {
        $request->validate($this->rules());

        $this->repository->update($request->except(['_token', '_method']), $id);

        return redirect(route('users.account'))->with('success', __("Votre profil a été mis à jour avec succès !"));
    }

    /**
     * User update password
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password()
    {
        return view('frontend.users.password');
    }

    /**
     * User password Update
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request, int $id)
    {
        $request->validate(['password'  => 'required|confirmed|min:6']);

        $this->repository->passwordUpdate($request->except(['_token', '_method']), $id);

        return redirect(route('users.password'))->with('success', __("Votre mot de passe a été mis à jour avec succès !"));
    }

    /**
     * Validation Rules
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name'   => 'required',
          'email'  => 'required',
          'avatar' => 'image|mimes:jpeg,png,jpg',
        ];
    }
}
