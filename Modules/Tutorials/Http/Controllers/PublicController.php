<?php

namespace TypiCMS\Modules\Tutorials\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Tutorials\Repositories\EloquentTutorial;

class PublicController extends BasePublicController
{
    public function __construct(EloquentTutorial $tutorial)
    {
        parent::__construct($tutorial);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page = request('page');
        $perPage = config('typicms.tutorials.per_page');
        $models = $this->repository->paginate($perPage, ['*'], 'page', $page);

        return view('tutorials::public.index')
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
        $model->addView();

        $prevPost = $this->repository->prev($model);
        $nextPost = $this->repository->next($model);

        return view('tutorials::public.show')
            ->with(compact('model', 'nextPost', 'prevPost'));
    }
}
