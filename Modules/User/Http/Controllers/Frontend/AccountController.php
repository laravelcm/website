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

    /**
     * Return User concern badges
     *
     * @return \Inertia\Response
     */
    public function badges()
    {
        return Inertia::render('user/Badges');
    }

    /**
     * Return User concern publishing
     *
     * @return \Inertia\Response
     */
    public function publishing()
    {
        return Inertia::render('user/Publishing');
    }
}
