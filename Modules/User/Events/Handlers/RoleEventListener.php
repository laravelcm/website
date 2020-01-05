<?php

namespace Modules\User\Events\Handlers;

/**
 * Class RoleEventListener.
 */
class RoleEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Role Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Role Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Role Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \Modules\User\Events\Role\RoleCreated::class,
            '\Modules\User\Events\Handlers\RoleEventListener@onCreated'
        );

        $events->listen(
            \Modules\User\Events\Role\RoleUpdated::class,
            '\Modules\User\Events\Handlers\RoleEventListener@onUpdated'
        );

        $events->listen(
            \Modules\User\Events\Role\RoleDeleted::class,
            '\Modules\User\Events\Handlers\RoleEventListener@onDeleted'
        );
    }
}
