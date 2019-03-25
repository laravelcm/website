<?php

namespace TypiCMS\Modules\Pages\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Pages\Facades\Pages;
use TypiCMS\Modules\Pages\Http\Requests\PageSectionFormRequest;
use TypiCMS\Modules\Pages\Models\Page;
use TypiCMS\Modules\Pages\Models\PageSection;
use TypiCMS\Modules\Pages\Repositories\EloquentPageSection;

class SectionsAdminController extends BaseAdminController
{
    public function __construct(EloquentPageSection $section)
    {
        parent::__construct($section);
    }

    /**
     * Create form for a new resource.
     *
     * @param \TypiCMS\Modules\Pages\Models\Page $page
     *
     * @return \Illuminate\View\View
     */
    public function create(Page $page)
    {
        $model = $this->repository->createModel();

        return view('pages::admin.create-section')
            ->with(compact('model', 'page'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Pages\Models\Page        $page
     * @param \TypiCMS\Modules\Pages\Models\PageSection $section
     *
     * @return \Illuminate\View\View
     */
    public function edit(Page $page, PageSection $section)
    {
        return view('pages::admin.edit-section')
            ->with([
                'model' => $section,
                'page' => $page,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Pages\Models\Page                          $page
     * @param \TypiCMS\Modules\Pages\Http\Requests\PageSectionFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Page $page, PageSectionFormRequest $request)
    {
        $section = $this->repository->create($request->all());
        Pages::forgetCache();

        return $this->redirect($request, $section);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Pages\Models\Page                          $page
     * @param \TypiCMS\Modules\Pages\Models\PageSection                   $section
     * @param \TypiCMS\Modules\Pages\Http\Requests\PageSectionFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Page $page, PageSection $section, PageSectionFormRequest $request)
    {
        $this->repository->update($request->id, $request->all());
        Pages::forgetCache();

        return $this->redirect($request, $section);
    }
}
