<?php 

namespace Manager\MenuManager;
use Illuminate\Support\ServiceProvider;

class MenuManagerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'menu-view');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/menu-manager')
        ], 'views');

        $this->publishes([
            __DIR__.'/config' => base_path('config'),
        ], 'config');

        $this->publishes([
            __DIR__.'/public' => public_path('packages/menu-manager'),
        ], 'public');

        $this->publishes([
            __DIR__.'/migrations' => base_path('database/migrations'),
        ], 'migrations');
    }
    
    public function register()
    {
        include __DIR__.'/route.php';
        $this->app->make('Manager\MenuManager\MenuManagerController');
    }
}