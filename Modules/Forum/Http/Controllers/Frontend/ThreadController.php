<?php

namespace Modules\Forum\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Forum\Entities\Channel;
use Modules\Forum\Entities\Thread;
use Modules\Forum\Entities\Trending;
use Modules\Forum\Filters\ThreadFilters;
use Modules\Forum\Http\Requests\ThreadRequest;
use Modules\Forum\Repositories\ThreadRepository;

class ThreadController extends Controller
{
    /**
     * @var ThreadRepository
     */
    protected $repository;

    /**
     * ThreadController constructor.
     *
     * @param ThreadRepository $repository
     */
    public function __construct(ThreadRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $threads = Thread::with('lastReply')->filter($request)->paginate(25);

        return Inertia::render('forum/Index', [
            'threads' => $threads,
        ]);
    }

    /**
     * Display a thread
     *
     * @param  string $channel
     * @param  string $thread
     * @return \Inertia\Response
     */
    public function thread($channel, $thread)
    {
        $thread = $this->repository->with('replies')->getByColumn($thread, 'slug');

        if (auth()->check()) {
            auth()->user()->read($thread);
        }

        $thread->increment('visits');

        return Inertia::render('forum/Thread', [
            'thread' => $thread
        ]);
    }

    /**
     * Store a newly thread in the database
     *
     * @param  ThreadRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ThreadRequest $request)
    {
        $request->merge(['user_id' => auth()->id()]);
        $thread = $this->repository->create($request->all());

        return redirect($thread->path);
    }
}
