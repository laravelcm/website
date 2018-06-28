<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Display List tutorials
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tutorials = [];

        return view('frontend.tutorials.index', compact('tutorials'));
    }

    /**
     * Display tutorial single Category
     *
     * @param string $category
     */
    public function category(string $category)
    {

    }

    /**
     * Display tutorial show
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(string $slug)
    {
        return view('frontend.tutorials.post');
    }
}
