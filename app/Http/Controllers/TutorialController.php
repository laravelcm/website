<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\TutorialRepository;

class TutorialController extends Controller
{
    /**
     * @var TutorialRepository
     */
    private $repository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * TutorialController constructor.
     * @param TutorialRepository $repository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(TutorialRepository $repository, CategoryRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display List tutorials
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tutorials = $this->repository->paginate();
        $populars = $this->repository->popular();
        $total = $this->repository->online()->count();
        $categories = $this->categoryRepository->categoryType('TUTORIAL');

        return view('frontend.tutorials.index', compact('tutorials', 'populars', 'categories', 'total'));
    }

    /**
     * Display tutorial single Category
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(string $slug)
    {
        $categories = $this->categoryRepository->categoryType('TUTORIAL');
        $category = $this->categoryRepository->findBySlug($slug);
        $tutorials = $category->tutorials()->where('is_published', true)->paginate(9);

        return view('frontend.tutorials.category', compact('tutorials', 'categories', 'category'));
    }

    /**
     * Display tutorial show
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(string $slug)
    {
        $tutorial = $this->repository->findBySlug($slug);
        $tutorial->addView();

        return view('frontend.tutorials.post', compact('tutorial'));
    }
}
