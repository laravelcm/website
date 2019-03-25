<?php

namespace TypiCMS\Modules\Forums\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Forums\Http\Requests\FormRequest;
use TypiCMS\Modules\Forums\Models\Forum;
use TypiCMS\Modules\Forums\Repositories\EloquentForum;

class AdminController extends BaseAdminController
{
    public function __construct(EloquentForum $forum)
    {
        parent::__construct($forum);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('forums::admin.index');
    }

    /**
     * Create form for a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = $this->repository->createModel();

        return view('forums::admin.create')
            ->with(compact('model'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Forums\Models\Forum $forum
     *
     * @return \Illuminate\View\View
     */
    public function edit(Forum $forum)
    {
        return view('forums::admin.edit')
            ->with(['model' => $forum]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Forums\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $forum = $this->repository->create($request->all());

        return $this->redirect($request, $forum);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Forums\Models\Forum             $forum
     * @param \TypiCMS\Modules\Forums\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Forum $forum, FormRequest $request)
    {
        $this->repository->update($forum->id, $request->all());

        return $this->redirect($request, $forum);
    }
}
