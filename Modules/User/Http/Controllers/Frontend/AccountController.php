<?php

namespace Modules\User\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('user/Account');
    }

    /**
     * Return User concern notifications
     *
     * @return \Inertia\Response
     */
    public function notifications()
    {
        return Inertia::render('user/Notifications');
    }
}
