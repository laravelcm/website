<?php

namespace Modules\Forum\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Forum\Filters\ThreadFilters;
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
     * Display a channel view
     *
     * @param  string $slug
     * @param  Request $request
     * @return \Inertia\Response
     */
    public function channel(string $slug, Request $request)
    {
        $channel = $this->channelRepository->with('threads')->getByColumn($slug, 'slug');

        if(!$channel) {
            abort('404', "La ressource que vous demandez n'est plus disponible ou a été supprimée.");
        }

        $threads = $channel->threads()
            ->with('lastReply')
            ->filter($request)
            ->orderByDesc('last_posted_at')
            ->paginate(25);

        return Inertia::render('forum/Channel', [
            'channel' => $channel,
            'threads' => $threads,
            'filters' => $request->all('search'),
        ]);
    }
}
