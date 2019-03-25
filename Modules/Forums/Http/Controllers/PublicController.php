<?php

namespace TypiCMS\Modules\Forums\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Forums\Repositories\EloquentForum;

class PublicController extends BasePublicController
{
    public function __construct(EloquentForum $forum)
    {
        parent::__construct($forum);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $models = $this->repository->findAll();

        return view('forums::public.index')
            ->with(compact('models'));
    }

    /**
     * Show resource.
     *
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $model = $this->repository->bySlug($slug);

        return view('forums::public.show')
            ->with(compact('model'));
    }
}
