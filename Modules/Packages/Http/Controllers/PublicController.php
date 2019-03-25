<?php

namespace TypiCMS\Modules\Packages\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Packages\Repositories\EloquentPackage;

class PublicController extends BasePublicController
{
    public function __construct(EloquentPackage $package)
    {
        parent::__construct($package);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page = request('page');
        $perPage = config('typicms.packages.per_page');
        $models = $this->repository->paginate($perPage, ['*'], 'page', $page);

        return view('packages::public.index')
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

        return view('packages::public.show')
            ->with(compact('model', 'nextPost', 'prevPost'));
    }
}
