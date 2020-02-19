<?php

namespace Modules\Forum\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Forum\Repositories\ChannelRepository;

class ForumController extends Controller
{
    /**
     * @var ChannelRepository
     */
    protected $channelRepository;

    /**
     * ForumController constructor.
     *
     * @param  ChannelRepository $channelRepository
     */
    public function __construct(ChannelRepository $channelRepository)
    {
        $this->channelRepository = $channelRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('forum/Index');
    }

    /**
     * Display a channel view
     *
     * @param  string $slug
     * @return \Inertia\Response
     */
    public function channel(string $slug)
    {
        $channel = $this->channelRepository->with('threads')->getByColumn($slug, 'slug');
        $threads = $channel->threads()->paginate(25);

        return Inertia::render('forum/Channel', [
            'channel' => $channel,
            'threads' => $threads
        ]);
    }
}
