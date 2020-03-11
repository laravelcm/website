<?php

namespace Modules\Blog\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Http\Requests\CreatePostRequest;
use Modules\Blog\Repositories\PostRepository;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    protected PostRepository $repository;

    /**
     * PostController constructor.
     *
     * @param PostRepository $repository
     */
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
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

        return view('blog::posts.create', compact('categories'));
    }

    /**
     * Create a new post to the database.
     *
     * @param  CreatePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(CreatePostRequest $request)
    {
        $published_at = new Carbon($request->input('published_at'));

        $this->repository->create([
           'title' => $request->get('title'),
           'body' => $request->get('body'),
           'status' => $request->get('status') ? Post::STATUS_PUBLISHED: Post::STATUS_DRAFT,
           'user_id' => auth()->id(),
           'category_id' => $request->get('category_id'),
           'published_at' => $published_at,
            'image' => $request->file('image')->store('posts', 'public')
        ]);

        smilify('success', "L'article a été enregistré avec succès");

        return redirect()->route('admin.posts.index');
    }

    /**
     * Delete a post form the database.
     *
     * @param  Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        smilify('success', "L'article a été supprimé avec succès");

        return redirect()->route('admin.posts.index');
    }
}
