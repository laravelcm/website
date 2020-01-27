<?php

namespace Modules\Blog\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Inertia\Inertia;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('blog/index');
    }

    /**
     * Display s single Post
     *
     * @param  string $slug
     * @return \Inertia\Response
     */
    public function post(string $slug)
    {
        return Inertia::render('blog/post');
    }
}
