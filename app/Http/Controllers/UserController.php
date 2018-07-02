<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
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
     * User update password
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updatePassword()
    {
        return view('frontend.users.password');
    }
}
