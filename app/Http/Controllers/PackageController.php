<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
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
        $packages = [];

        return view('frontend.packages.index', compact('packages'));
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
        return view('frontend.packages.post');
    }
}
