<?php

namespace App\Http\Controllers;

use App\Repositories\PackageRepository;
use App\Repositories\PostRepository;
use App\Repositories\TutorialRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @var PackageRepository
     */
    private $packageRepository;

    /**
     * @var TutorialRepository
     */
    private $tutorialRepository;

    /**
     * Create a new controller instance.
     *
     * @param PostRepository $postRepository
     * @param PackageRepository $packageRepository
     * @param TutorialRepository $tutorialRepository
     */
    public function __construct(PostRepository $postRepository, PackageRepository $packageRepository, TutorialRepository $tutorialRepository)
    {
        $this->postRepository = $postRepository;
        $this->packageRepository = $packageRepository;
        $this->tutorialRepository = $tutorialRepository;
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->last(6);
        $event = [];
        $events = [];

        return view('frontend.home', compact('posts'));
    }

    /**
     * Search function
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        if ($request->has('q') && !empty($request->get('q'))) {
            $results   = [];
            $packages  = $this->packageRepository->search($request->get('q'));
            $posts     = $this->postRepository->search($request->get('q'));
            $tutorials = $this->tutorialRepository->search($request->get('q'));

            foreach ($packages as $package) {
                $p = new \stdClass();
                $p->title  = $package->title;
                $p->slug   = $package->slug;
                $p->resume = $package->resume;
                $p->image  = $package->image;
                $p->created_at  = $package->created_at;
                $p->url    = 'packages.post';

                array_push($results, $p);
            }

            foreach ($posts as $post) {
                $pt = new \stdClass();
                $pt->title  = $post->title;
                $pt->slug   = $post->slug;
                $pt->resume = $post->except;
                $pt->image  = $post->image;
                $pt->created_at  = $post->created_at;
                $pt->url    = 'blog.post';

                array_push($results, $pt);
            }

            foreach ($tutorials as $tutorial) {
                $t = new \stdClass();
                $t->title  = $tutorial->title;
                $t->slug   = $tutorial->slug;
                $t->resume = $tutorial->resume;
                $t->image  = $tutorial->image;
                $t->created_at  = $tutorial->created_at;
                $t->url    = 'tutorials.post';

                array_push($results, $t);
            }

            $total = count($results);

        } else {
            $results = [];
            $total = 0;
        }

        return view('frontend.search', compact('results', 'total'));
    }
}
