<?php

namespace Modules\Dashboard\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Backend\BackendBaseController;

class DashboardController extends BackendBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function dashboard()
    {
        return view('dashboard::dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function blank()
    {
        return view('dashboard::blank');
    }
}
