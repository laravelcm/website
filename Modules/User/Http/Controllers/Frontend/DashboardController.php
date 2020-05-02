<?php

namespace Modules\User\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display user dashboard
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('user/Dashboard');
    }
}
