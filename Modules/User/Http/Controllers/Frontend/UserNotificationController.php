<?php

namespace Modules\User\Http\Controllers\Frontend;

use Inertia\Inertia;
use Modules\Core\Http\Controllers\Frontend\FrontendBaseController;

class UserNotificationController extends FrontendBaseController
{
    /**
     * Return User concern notifications
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('user/Notifications');
    }

    /**
     * Mark a specific notification as read.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        auth()->user()->notifications()->findOrFail($id)->markAsRead();

        return response()->json(['status' => 'success', 'notifications' => auth()->user()->unreadNotifications()]);
    }
}
