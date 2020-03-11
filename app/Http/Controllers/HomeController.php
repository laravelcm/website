<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Inertia\Inertia;
use Modules\Blog\Entities\Post;
use Modules\Blog\Repositories\PostRepository;
use Modules\Forum\Repositories\ThreadRepository;

class HomeController extends Controller
{
    /**
     * @var ThreadRepository
     */
    protected ThreadRepository $threadRepository;

    /**
     * @var PostRepository
     */
    protected PostRepository $postRepository;

    /**
     * HomeController constructor.
     *
     * @param  ThreadRepository $threadRepository
     * @param  PostRepository $postRepository
     */
    public function __construct(ThreadRepository $threadRepository, PostRepository $postRepository)
    {
        $this->threadRepository = $threadRepository;
        $this->postRepository = $postRepository;
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

        $posts = Post::publish()
            ->orderBy('created_at', 'desc')
            ->limit(12)
            ->get();

        return Inertia::render('home/Index', [
            'threads' => $threads,
            'posts' => $posts
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
