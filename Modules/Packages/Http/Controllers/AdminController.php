<?php

namespace TypiCMS\Modules\Packages\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Packages\Http\Requests\FormRequest;
use TypiCMS\Modules\Packages\Models\Package;
use TypiCMS\Modules\Packages\Repositories\EloquentPackage;

class AdminController extends BaseAdminController
{
    public function __construct(EloquentPackage $package)
    {
        parent::__construct($package);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('packages::admin.index');
    }

    /**
     * Create form for a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = $this->repository->createModel();

        return view('packages::admin.create')
            ->with(compact('model'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Packages\Models\Package $package
     *
     * @return \Illuminate\View\View
     */
    public function edit(Package $package)
    {
        return view('packages::admin.edit')
            ->with(['model' => $package]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Packages\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $package = $this->repository->create($request->all());

        return $this->redirect($request, $package);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Packages\Models\Package             $package
     * @param \TypiCMS\Modules\Packages\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Package $package, FormRequest $request)
    {
        $this->repository->update($request->id, $request->all());

        return $this->redirect($request, $package);
    }
}
