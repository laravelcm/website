<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * BlogController constructor.
     * @param PostRepository $postRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display List posts
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->postRepository->paginate(6);
        $total = $this->postRepository->online()->count();
        $categories = $this->categoryRepository->categoryType('POST');
        $category = null;

        return view('frontend.blog.home', compact('posts', 'total', 'categories', 'category'));
    }

    /**
     * Display Blog single Category
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(string $slug)
    {
        $total = $this->postRepository->online()->count();
        $categories = $this->categoryRepository->categoryType('POST');
        $category = $this->categoryRepository->findBySlug($slug);
        $posts = $category->posts()->where('status', 'PUBLISHED')->paginate(6);

        return view('frontend.blog.home', compact('posts', 'total', 'categories', 'category'));
    }

    /**
     * Display post show
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(string $slug)
    {
        $post = $this->postRepository->findBySlug($slug);

        return view('frontend.blog.post', compact('post'));
    }
}
