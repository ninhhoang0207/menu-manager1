<?php 

namespace Manager\MenuManager;
use Illuminate\Support\ServiceProvider;

class MenuManagerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'menu-view');
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/route.php';
        }

        $this->publishes([
            __DIR__.'/config' => base_path('config'),
        ], 'config');

        $this->publishes([
            __DIR__.'/public' => public_path('vendor/menu-manager'),
        ], 'public');

        $this->publishes([
            __DIR__.'/migrations' => base_path('database/migrations'),
        ], 'migrations');
    }
    
    public function register()
    {
        
    }
}