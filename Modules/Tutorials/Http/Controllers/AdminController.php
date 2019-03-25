<?php

namespace TypiCMS\Modules\Tutorials\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Tutorials\Http\Requests\FormRequest;
use TypiCMS\Modules\Tutorials\Models\Tutorial;
use TypiCMS\Modules\Tutorials\Repositories\EloquentTutorial;

class AdminController extends BaseAdminController
{
    public function __construct(EloquentTutorial $tutorial)
    {
        parent::__construct($tutorial);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('tutorials::admin.index');
    }

    /**
     * Create form for a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = $this->repository->createModel();

        return view('tutorials::admin.create')
            ->with(compact('model'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Tutorials\Models\Tutorial $tutorial
     *
     * @return \Illuminate\View\View
     */
    public function edit(Tutorial $tutorial)
    {
        return view('tutorials::admin.edit')
            ->with(['model' => $tutorial]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Tutorials\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $tutorial = $this->repository->create($request->all());

        return $this->redirect($request, $tutorial);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Tutorials\Models\Tutorial             $tutorial
     * @param \TypiCMS\Modules\Tutorials\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Tutorial $tutorial, FormRequest $request)
    {
        $this->repository->update($tutorial->id, $request->all());

        return $this->redirect($request, $tutorial);
    }
}
