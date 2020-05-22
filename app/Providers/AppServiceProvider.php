<?php

namespace App\Providers;

use App;
use App\Models\User;
use App\Models\Invitation;
use App\Observers\UserObserver;
use App\Observers\InvitationObserver;
use App\Http\Controllers\DemoScreenshotControllerStrategy;
use App\Http\Controllers\ScreenshotControllerStrategy;
use App\Http\Controllers\ScreenshotControllerStrategyInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (App::environment(['demo', 'staging'])) {
            $this->app->bind(
                ScreenshotControllerStrategyInterface::class,
                DemoScreenshotControllerStrategy::class
            );
        } else {
            $this->app->bind(
                ScreenshotControllerStrategyInterface::class,
                ScreenshotControllerStrategy::class
            );
        }

        User::observe(UserObserver::class);
        Invitation::observe(InvitationObserver::class);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (config('app.debug') && $this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }
    }
}
