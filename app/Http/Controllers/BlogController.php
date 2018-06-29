<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Display List posts
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = [];

        return view('frontend.blog.home', compact('posts'));
    }

    /**
     * Display Blog single Category
     *
     * @param string $category
     */
    public function category(string $category)
    {

    }

    /**
     * Display post show
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(string $slug)
    {
        return view('frontend.blog.post');
    }
}
