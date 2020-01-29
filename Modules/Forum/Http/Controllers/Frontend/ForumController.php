<?php

namespace Modules\Forum\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Inertia\Inertia;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('forum/index');
    }
}
