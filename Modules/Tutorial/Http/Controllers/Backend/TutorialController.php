<?php

namespace Modules\Tutorial\Http\Controllers\Backend;

use App\Repositories\MediaRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Tutorial\Entities\Category;
use Modules\Tutorial\Entities\Tutorial;
use Modules\Tutorial\Http\Requests\TutorialRequest;
use Modules\Tutorial\Repositories\TutorialRepository;

class TutorialController extends Controller
{
    /**
     * @var TutorialRepository
     */
    protected TutorialRepository $repository;

    /**
     * @var MediaRepository
     */
    protected MediaRepository $mediaRepository;

    /**
     * TutorialController new instance.
     *
     * @param  TutorialRepository  $repository
     * @param  MediaRepository  $mediaRepository
     */
    public function __construct(TutorialRepository $repository, MediaRepository $mediaRepository)
    {
        $this->repository = $repository;
        $this->mediaRepository = $mediaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('tutorial::tutorials.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $status = collect([
            ['value' => Tutorial::STATUS_DRAFT, 'name' => 'Brouillon'],
            ['value' => Tutorial::STATUS_PUBLISHED, 'name' => 'Publié']
        ])->pluck('name', 'value');

        return view('tutorial::tutorials.create', compact('categories', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TutorialRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TutorialRequest $request)
    {
        $published_at = now();

        if ($request->input('date')) {
            $published_at = Carbon::createFromFormat('Y-m-d H:i', $request->input('date').' '.($request->input('time') ?? now()->format('H:i')))->toDateTimeString();
        }

        $tutorial = $this->repository->create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'status' => $request->input('status'),
            'summary' => $request->input('summary'),
            'provider' => $request->input('provider'),
            'provider_id' => $request->input('provider_id'),
            'user_id' => auth()->id(),
            'category_id' => $request->input('category_id'),
            'published_at' => $published_at,
        ]);

        if ($request->input('media_id') !== "0") {
            $media = $this->mediaRepository->getById($request->input('media_id'));
            $media->update([
                'mediatable_type'   => $this->repository->model(),
                'mediatable_id'     => $tutorial->id
            ]);
        }

        smilify('success', "Le tutoriel a été enregistré avec succès");

        return redirect()->route('admin.tutorials.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tutorial  $tutorial
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Tutorial $tutorial)
    {
        $categories = Category::pluck('name', 'id');
        $status = collect([
            ['value' => Tutorial::STATUS_DRAFT, 'name' => 'Brouillon'],
            ['value' => Tutorial::STATUS_PUBLISHED, 'name' => 'Publié']
        ])->pluck('name', 'value');

        return view('tutorial::tutorials.edit', compact('tutorial', 'categories', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TutorialRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TutorialRequest $request, $id)
    {
        $published_at = now();

        if ($request->input('date')) {
            $published_at = Carbon::createFromFormat('Y-m-d H:i', $request->input('date').' '.($request->input('time') ?? now()->format('H:i')))->toDateTimeString();
        }

        $tutorial = $this->repository->updateById($id, [
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'status' => $request->input('status'),
            'summary' => $request->input('summary'),
            'provider' => $request->input('provider'),
            'provider_id' => $request->input('provider_id'),
            'category_id' => $request->input('category_id'),
            'published_at' => $published_at,
        ]);

        if ($request->input('media_id') !== "0") {

            // Get the current Media
            $media = $this->mediaRepository->getById($request->input('media_id'));

            if ($tutorial->previewImage && $tutorial->previewImage->id !== (int) $request->input('media_id')) {
                // Remove media from the given collection
                $tutorial->previewImage()->delete();

                $media->update([
                    'mediatable_type'   => $this->repository->model(),
                    'mediatable_id'     => $tutorial->id,
                ]);
            }

            $media->update([
                'mediatable_type'   => $this->repository->model(),
                'mediatable_id'     => $tutorial->id,
            ]);
        }

        smilify('success', "Le tutoriel a été modifié avec succès!");

        return redirect()->route('admin.tutorials.index');
    }

    /**
     * Supprimer un tutoriel de la base de données.
     *
     * @param  Request  $request
     * @param  Tutorial  $tutorial
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Tutorial $tutorial)
    {
        try {
            $tutorial->delete();

            smilify('success', "Le tutoriel a été supprimé avec succès");

            if ($request->isXmlHttpRequest()) {
                return response()->json(['redirect_url' => route('admin.tutorials.index')]);
            }

            return redirect()->route('admin.tutorials.index');
        } catch (\Exception $e) {
            smilify('error', "Vous ne pouvez pas supprimer ce tutoriel!");

            return back();
        }
    }
}
