<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Maatwebsite\Sidebar\SidebarManager;
use Modules\Core\Sidebar\AdminSidebar;

class SidebarServiceProvider extends ServiceProvider
{
    /**
     * @param SidebarManager $manager
     */
    public function boot(SidebarManager $manager)
    {
        $manager->register(AdminSidebar::class);
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
