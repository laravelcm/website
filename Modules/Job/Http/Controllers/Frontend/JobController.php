<?php

namespace Modules\Job\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Inertia\Inertia;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('jobs/Index');
    }

    /**
     * Retourne la page de coming soon.
     *
     * @return \Inertia\Response
     */
    public function soon()
    {
        return Inertia::render('jobs/Soon');
    }
}
