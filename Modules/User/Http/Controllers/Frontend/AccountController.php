<?php

namespace Modules\User\Http\Controllers\Frontend;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Modules\Blog\Repositories\PostRepository;
use Modules\Forum\Repositories\ThreadRepository;

class AccountController extends Controller
{
    /**
     * @var PostRepository
     */
    protected PostRepository $postRepository;

    /**
     * @var ThreadRepository
     */
    protected ThreadRepository $threadRepository;

    public function __construct(PostRepository $postRepository, ThreadRepository $threadRepository)
    {
        $this->postRepository = $postRepository;
        $this->threadRepository = $threadRepository;
    }

    /**
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('user/Account');
    }

    /**
     * Return User concern badges
     *
     * @return \Inertia\Response
     */
    public function badges()
    {
        return Inertia::render('user/Badges');
    }

    /**
     * Return User concern publishing
     *
     * @return \Inertia\Response
     */
    public function publishing()
    {
        $posts = $this->postRepository
            ->where('proposed_by', auth()->id())
            ->get();

        $threads = $this->threadRepository
            ->where('user_id', auth()->id())
            ->get();

        return Inertia::render('user/Publishing', [
            'posts' => $posts,
            'threads' => $threads
        ]);
    }

    public function deactivate()
    {
        return back()->with('error', "Cette fonctionnalité n'est pas encore disponible 😓");
    }
}
