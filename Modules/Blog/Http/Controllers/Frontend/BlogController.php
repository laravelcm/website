<?php

namespace Modules\Blog\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Inertia\Inertia;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View;
     */
    public function index()
    {
        return Inertia::render('blog/index');
    }
}
