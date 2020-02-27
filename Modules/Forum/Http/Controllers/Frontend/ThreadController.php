<?php

namespace Modules\Forum\Http\Controllers\Frontend;

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
     * @param  ThreadFilters $filters
     * @return \Inertia\Response
     */
    public function index(ThreadFilters $filters)
    {
        $threads = $this->getThreads($filters);

        return Inertia::render('forum/Index', [
            'threads' => $threads,
        ]);
    }

    /**
     * Display a thread
     *
     * @param  string $channel
     * @param  string $thread
     * @param  Trending $trending
     * @return \Inertia\Response
     */
    public function thread($channel, $thread, Trending $trending)
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

    /**
     * Fetch all relevant threads.
     *
     * @param Channel       $channel
     * @param ThreadFilters $filters
     * @return mixed
     */
    protected function getThreads(ThreadFilters $filters, Channel $channel = null)
    {
        $threads = Thread::with('lastReply')->latest()->filter($filters);

        if ($channel && $channel->exists) {
            $threads->where('channel_id', $channel->id);
        }

        return $threads->paginate(25);
    }
}
