<?php

namespace App\Providers;

use App\Helpers\RoleHelper;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class HelpersProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/RoleHelper.php';
        require_once app_path() . '/Helpers/UserHelper.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('role', function ($role) {
            switch ($role) {
                case 'registered':
                    return RoleHelper::REGISTERED;
                case 'moderator':
                    return RoleHelper::MODERATOR;
                case 'manager':
                    return RoleHelper::MANAGER;
                case 'admin':
                    return RoleHelper::ADMIN;
            }
        });
    }
}
