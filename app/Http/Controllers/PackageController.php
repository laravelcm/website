<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PackageRepository;

class PackageController extends Controller
{
    /**
     * @var PackageRepository
     */
    private $repository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * PackageController constructor.
     * @param PackageRepository $repository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(PackageRepository $repository, CategoryRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display List Packages
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $packages = $this->repository->paginate();
        $total = $this->repository->online()->count();
        $categories = $this->categoryRepository->categoryType('PACKAGE');
        $category = null;

        return view('frontend.packages.index', compact('packages', 'categories', 'total', 'category'));
    }

    /**
     * Display Package single Category
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(string $slug)
    {
        $total = $this->repository->online()->count();
        $categories = $this->categoryRepository->categoryType('PACKAGE');
        $category = $this->categoryRepository->findBySlug($slug);
        $packages = $category->packages()->where('is_approved', true)->paginate(6);

        return view('frontend.packages.index', compact('packages', 'categories', 'total', 'category'));
    }

    /**
     * Display single package view
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(string $slug)
    {
        $package = $this->repository->findBySlug($slug);
        $package->addView();

        return view('frontend.packages.post', compact('package'));
    }
}
