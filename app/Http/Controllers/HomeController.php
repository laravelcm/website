<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Inertia\Inertia;
use Modules\Forum\Repositories\ThreadRepository;

class HomeController extends Controller
{
    /**
     * @var ThreadRepository
     */
    protected ThreadRepository $threadRepository;

    /**
     * HomeController constructor.
     *
     * @param ThreadRepository $threadRepository
     */
    public function __construct(ThreadRepository $threadRepository)
    {
        $this->threadRepository = $threadRepository;
    }

    /**
     * Return HomePage view
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $threads = $this->threadRepository
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get()
            ->each(fn($thread) => $thread->title = Str::limit($thread->title, 30));

        return Inertia::render('home/Index', [
            'threads' => $threads
        ]);
    }

    /**
     * Display Privacy View
     *
     * @return \Inertia\Response
     */
    public function privacy()
    {
        return Inertia::render('commons/Privacy');
    }

    /**
     * Display Privacy View
     *
     * @return \Inertia\Response
     */
    public function terms()
    {
        return Inertia::render('commons/Terms');
    }
}
