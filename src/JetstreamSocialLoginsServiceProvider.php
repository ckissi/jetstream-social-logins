<?php

namespace Ckissi\JetstreamSocialLogins;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class JetstreamSocialLoginsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'jetstream-social-logins');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'jetstream-social-logins');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('jetstream-social-logins.php'),
            ], 'jetstream-social-logins-config');

            // Publishing the views.
            // $this->publishes([
            //     __DIR__.'/../resources/views' => resource_path('views/vendor/social-logins'),
            // ], 'views');
            $this->publishes([
                 __DIR__.'/../resources/js' => resource_path('js'),
            ], 'jetstream-social-logins-js');

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/social-logins'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/social-logins'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
        Inertia::share('show_login', config('jetstream-social-logins.show_login'));
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'jetstream-social-logins');

        // Register the main class to use with the facade
        $this->app->singleton('jetstream-social-logins', function () {
            return new JetstreamSocialLogins;
        });
    }
}
