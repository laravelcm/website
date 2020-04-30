<?php

namespace Modules\Tutorial\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Tutorial\Entities\Category;
use Modules\Tutorial\Entities\Tutorial;
use Modules\Tutorial\Repositories\TutorialRepository;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $tutorials = (new TutorialRepository())
            ->orderBy('published_at', 'desc')
            ->publish()
            ->paginate(16);

        return Inertia::render('tutorials/Index', [
            'tutorials' => $tutorials
        ]);
    }

    /**
     * Display a category listing posts.
     *
     * @param  string $slug
     * @return \Inertia\Response
     */
    public function category(string $slug)
    {
        $category = Category::with('tutorials')->where('slug', $slug)->firstOrFail();
        $tutorials = $category->tutorials()
            ->publish()
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        return Inertia::render('tutorials/Category', [
            'category' => $category,
            'tutorials' => $tutorials
        ]);
    }

    /**
     * Display a single tutorial
     *
     * @param  string $slug
     * @return \Inertia\Response
     */
    public function show(string $slug)
    {
        $tutorial = Tutorial::where('slug', $slug)->firstOrFail();

        $tutorial->increment('visits');

        return Inertia::render('tutorials/Show', [
            'tutorial' => $tutorial
        ]);
    }
}
