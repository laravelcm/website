<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Return HomePage view
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('home/Index');
    }

    /**
     * Display Privacy View
     *
     * @return \Inertia\Response
     */
    public function privacy()
    {
        return Inertia::render('commons/Privacy');
    }

    /**
     * Display Privacy View
     *
     * @return \Inertia\Response
     */
    public function terms()
    {
        return Inertia::render('commons/Terms');
    }
}
