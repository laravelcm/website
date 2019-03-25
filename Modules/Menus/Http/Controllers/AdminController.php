<?php

namespace TypiCMS\Modules\Menus\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Menus\Http\Requests\FormRequest;
use TypiCMS\Modules\Menus\Models\Menu;
use TypiCMS\Modules\Menus\Repositories\EloquentMenu;

class AdminController extends BaseAdminController
{
    public function __construct(EloquentMenu $menu)
    {
        parent::__construct($menu);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('menus::admin.index');
    }

    /**
     * Create form for a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = $this->repository->createModel();

        return view('menus::admin.create')
            ->with(compact('model'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Menus\Models\Menu $menu
     *
     * @return \Illuminate\View\View
     */
    public function edit(Menu $menu)
    {
        return view('menus::admin.edit')
            ->with(['model' => $menu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Menus\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $menu = $this->repository->create($request->all());

        return $this->redirect($request, $menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Menus\Models\Menu               $menu
     * @param \TypiCMS\Modules\Menus\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Menu $menu, FormRequest $request)
    {
        $this->repository->update($request->id, $request->all());

        return $this->redirect($request, $menu);
    }
}
