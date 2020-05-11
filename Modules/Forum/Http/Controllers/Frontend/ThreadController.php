<?php

namespace Modules\Forum\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\Core\Http\Controllers\Frontend\FrontendBaseController;
use Modules\Forum\Entities\Reply;
use Modules\Forum\Entities\Thread;
use Modules\Forum\Http\Requests\ThreadRequest;
use Modules\Forum\Notifications\SendSlackThread;
use Modules\Forum\Repositories\ThreadRepository;

class ThreadController extends FrontendBaseController
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
        $threads = Thread::with('lastReply')
            ->filter($request)
            ->orderByDesc('last_posted_at')
            ->paginate(25);

        return Inertia::render('forum/Index', [
            'threads' => $threads,
            'filters' => $request->all('search'),
        ])->withViewData([
            'title' => 'Forum',
            'description' => "Les forums communautaires sont un endroit pour discuter de tout ce qui concerne le développement / le design. Laravel Cameroun offrira l'un des plus grands forum francophone sur Laravel & PHP",
            'openGraphURL' => url("/forum")
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

        if(!$thread) {
            abort('404', "La ressource que vous demandez n'est plus disponible ou a été supprimée.");
        }

        if (auth()->check()) {
            auth()->user()->read($thread);
        }

        $thread->increment('visits');

        return Inertia::render('forum/Thread', [
            'thread' => $thread
        ])->withViewData([
            'title' => $thread->title,
            'description' => $thread->resume,
            'openGraphURL' => url($thread->path),
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

        $thread->creator->notify(new SendSlackThread($thread));

        return redirect($thread->path);
    }

    /**
     * Return the users list on a thread.
     *
     * @param  $channel
     * @param  Thread $thread
     * @return \Illuminate\Support\Collection
     */
    public function users($channel, Thread $thread)
    {
        $users = collect();

        if ($thread->creator->id !== auth()->id()) {
            $users->add($thread->creator);
        }

        Reply::where('thread_id', $thread->id)->get()->each(function ($reply) use ($users) {
            if ($reply->owner->id !== auth()->id()) {
                if (!$users->contains($reply->owner)) {
                    $users->add($reply->owner);
                }
            }
        });

        return $users;
    }

    /**
     * Delete the given thread.
     *
     * @param  $channel
     * @param  Thread $thread
     * @return mixed
     * @throws \Exception
     */
    public function destroy($channel, Thread $thread)
    {
        $this->authorize('update', $thread);

        $thread->delete();

        return redirect()->route('forum');
    }
}
