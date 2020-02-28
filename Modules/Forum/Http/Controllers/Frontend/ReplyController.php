<?php

namespace Modules\Forum\Http\Controllers\Frontend;

use Modules\Core\Http\Controllers\Frontend\FrontendBaseController;
use Modules\Forum\Entities\Reply;
use Modules\Forum\Entities\Thread;
use Modules\Forum\Http\Requests\CreateReplyRequest;

class ReplyController extends FrontendBaseController
{
    /**
     * * Store a newly created resource in storage.
     *
     * @param  Thread $thread
     * @param  CreateReplyRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Thread $thread, CreateReplyRequest $request)
    {
        $this->authorize('create', Reply::class);

        if ($thread->locked) {
            return response()->json(['status' => 'error', 'message' => 'Ce sujet est bloqué impossible de le commenter'], 422);
        }

        $thread->addReply([
            'body' => $request->get('body'),
            'user_id' => auth()->id()
        ])->load('owner');

        $thread->update(['last_posted_at' => now()]);

        return response()->json(['status' => 'success', 'message' => "Votre commentaire a été envoyé"]);
    }
}
