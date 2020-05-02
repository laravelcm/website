<?php

namespace Modules\User\Events\Handlers;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('User Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('User Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('User Deleted');
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        \Log::info('User Confirmed');
    }

    /**
     * @param $event
     */
    public function onUnconfirmed($event)
    {
        \Log::info('User Unconfirmed');
    }

    /**
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        \Log::info('User Password Changed');
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        \Log::info('User Deactivated');
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        \Log::info('User Reactivated');
    }

    /**
     * @param $event
     */
    public function onSocialDeleted($event)
    {
        \Log::info('User Social Deleted');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info('User Permanently Deleted');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info('User Restored');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \Modules\User\Events\User\UserCreated::class,
            'Modules\User\Events\Handlers\UserEventListener@onCreated'
        );

        $events->listen(
            \Modules\User\Events\User\UserUpdated::class,
            'Modules\User\Events\Handlers\UserEventListener@onUpdated'
        );

        $events->listen(
            \Modules\User\Events\User\UserDeleted::class,
            'Modules\User\Events\Handlers\UserEventListener@onDeleted'
        );

        $events->listen(
            \Modules\User\Events\User\UserConfirmed::class,
            'Modules\User\Events\Handlers\UserEventListener@onConfirmed'
        );

        $events->listen(
            \Modules\User\Events\User\UserUnconfirmed::class,
            'Modules\User\Events\Handlers\UserEventListener@onUnconfirmed'
        );

        $events->listen(
            \Modules\User\Events\User\UserPasswordChanged::class,
            'Modules\User\Events\Handlers\UserEventListener@onPasswordChanged'
        );

        $events->listen(
            \Modules\User\Events\User\UserDeactivated::class,
            'Modules\User\Events\Handlers\UserEventListener@onDeactivated'
        );

        $events->listen(
            \Modules\User\Events\User\UserReactivated::class,
            'Modules\User\Events\Handlers\UserEventListener@onReactivated'
        );

        $events->listen(
            \Modules\User\Events\User\UserSocialDeleted::class,
            'Modules\User\Events\Handlers\UserEventListener@onSocialDeleted'
        );

        $events->listen(
            \Modules\User\Events\User\UserPermanentlyDeleted::class,
            'Modules\User\Events\Handlers\UserEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \Modules\User\Events\User\UserRestored::class,
            'Modules\User\Events\Handlers\UserEventListener@onRestored'
        );
    }
}
