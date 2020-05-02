<?php

namespace Modules\User\Events\Handlers\Frontend;

use Modules\User\Events\Frontend\UserConfirmed;
use Modules\User\Events\Frontend\UserLoggedIn;
use Modules\User\Events\Frontend\UserLoggedOut;
use Modules\User\Events\Frontend\UserProviderRegistered;
use Modules\User\Events\Frontend\UserRegistered;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onLoggedIn($event)
    {
        $ip_address = request()->getClientIp();

        // Update the logging in users time & IP
        $event->user->fill([
            'last_login_at' => now()->toDateTimeString(),
            'last_login_ip' => $ip_address,
        ]);

        // Update the timezone via IP address
        $geoip = geoip($ip_address);

        if ($event->user->timezone !== $geoip['timezone']) {
            // Update the users timezone
            $event->user->fill([
                'timezone' => $geoip['timezone'],
            ]);
        }

        $event->user->save();

        \Log::info('User Logged In: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onLoggedOut($event)
    {
        \Log::info('User Logged Out: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onRegistered($event)
    {
        \Log::info('User Registered: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onProviderRegistered($event)
    {
        \Log::info('User Provider Registered: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        \Log::info('User Confirmed: '.$event->user->full_name);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            UserLoggedIn::class,
            'Modules\User\Events\Handlers\Frontend\UserEventListener@onLoggedIn'
        );

        $events->listen(
            UserLoggedOut::class,
            'Modules\User\Events\Handlers\Frontend\UserEventListener@onLoggedOut'
        );

        $events->listen(
            UserRegistered::class,
            'Modules\User\Events\Handlers\Frontend\UserEventListener@onRegistered'
        );

        $events->listen(
            UserProviderRegistered::class,
            'Modules\User\Events\Handlers\Frontend\UserEventListener@onProviderRegistered'
        );

        $events->listen(
            UserConfirmed::class,
            'Modules\User\Events\Handlers\Frontend\UserEventListener@onConfirmed'
        );
    }
}
