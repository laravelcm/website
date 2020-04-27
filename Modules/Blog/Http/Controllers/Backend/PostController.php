<?php

namespace Modules\Blog\Http\Controllers\Backend;

use App\Repositories\MediaRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Http\Requests\PostRequest;
use Modules\Blog\Repositories\PostRepository;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    protected PostRepository $repository;

    /**
     * @var MediaRepository
     */
    protected MediaRepository $mediaRepository;

    /**
     * PostController constructor.
     *
     * @param  PostRepository  $repository
     * @param  MediaRepository  $mediaRepository
     */
    public function __construct(PostRepository $repository, MediaRepository $mediaRepository)
    {
        $this->repository = $repository;
        $this->mediaRepository = $mediaRepository;
    }

    /**
     * Display resources list.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $records = $this->repository->paginate(15);

        return view('blog::posts.index', compact('records'));
    }

    /**
     * Return form view to create a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $status = collect([
            ['value' => Post::STATUS_DRAFT, 'name' => 'Brouillon'],
            ['value' => Post::STATUS_PUBLISHED, 'name' => 'Publié']
        ])->pluck('name', 'value');

        return view('blog::posts.create', compact('categories', 'status'));
    }

    /**
     * Create a new post to the database.
     *
     * @param  PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(PostRequest $request)
    {
        $published_at = now();

        if ($request->input('date')) {
            $published_at = Carbon::createFromFormat('Y-m-d H:i', $request->input('date').' '.($request->input('time') ?? now()->format('H:i')))->toDateTimeString();
        }

        $post = $this->repository->create([
           'title' => $request->input('title'),
           'body' => $request->input('body'),
           'status' => $request->input('status'),
           'user_id' => auth()->id(),
           'category_id' => $request->input('category_id'),
           'published_at' => $published_at,
        ]);

        if ($request->input('media_id') !== "0") {
            $media = $this->mediaRepository->getById($request->input('media_id'));
            $media->update([
                'mediatable_type'   => $this->repository->model(),
                'mediatable_id'     => $post->id
            ]);
        }

        smilify('success', "L'article a été enregistré avec succès");

        return redirect()->route('admin.posts.index');
    }

    /**
     * Affiche la page d'edition de l'article.
     *
     * @param  Post  $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id');
        $status = collect([
            ['value' => Post::STATUS_DRAFT, 'name' => 'Brouillon'],
            ['value' => Post::STATUS_PUBLISHED, 'name' => 'Publié']
        ])->pluck('name', 'value');

        return view('blog::posts.edit', compact('categories', 'status', 'post'));
    }

    /**
     * Mise a jour d'un article.
     *
     * @param  PostRequest  $request
     * @param  Post  $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, $slug)
    {
        $published_at = now();

        if ($request->input('date')) {
            $published_at = Carbon::createFromFormat('Y-m-d H:i', $request->input('date').' '.($request->input('time') ?? now()->format('H:i')))->toDateTimeString();
        }

        $this->repository->getByColumn($slug, 'slug')->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'status' => $request->input('status'),
            'user_id' => auth()->id(),
            'category_id' => $request->input('category_id'),
            'published_at' => $published_at,
        ]);

        $post = $this->repository->getByColumn($slug, 'slug')->first();

        if ($request->input('media_id') !== "0") {

            // Get the current Media
            $media = $this->mediaRepository->getById($request->input('media_id'));

            if ($post->previewImage && $post->previewImage->id !== (int) $request->input('media_id')) {
                // Remove media from the given collection
                $post->previewImage()->delete();

                $media->update([
                    'mediatable_type'   => $this->repository->model(),
                    'mediatable_id'     => $post->id,
                ]);
            }

            $media->update([
                'mediatable_type'   => $this->repository->model(),
                'mediatable_id'     => $post->id,
            ]);
        }

        smilify('success', "L'article a été modifié avec succès!");

        return redirect()->route('admin.posts.index');
    }

    /**
     * Supprimer un article de la base de données.
     *
     * @param  Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Post $post)
    {
        try {
            $post->delete();

            smilify('success', "L'article a été supprimé avec succès");

            if ($request->isXmlHttpRequest()) {
                return response()->json(['redirect_url' => route('admin.posts.index')]);
            }

            return redirect()->route('admin.posts.index');
        } catch (\Exception $e) {
            smilify('error', "Vous ne pouvez pas supprimer cet article!");

            return back();
        }
    }
}
