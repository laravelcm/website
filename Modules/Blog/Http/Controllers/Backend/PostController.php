<?php

namespace Modules\Blog\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
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


    public function index()
    {
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

    public function store(CreatePostRequest $request)
    {
        dd($request->all());
    }
}
