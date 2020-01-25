<?php

namespace Modules\Tutorial\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Inertia\Inertia;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('tutorials/index');
    }
}
