<?php

namespace Litecms\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'contact');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'contact');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Call pblish redources function
        $this->publishResources();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'litecms.contact');

        // Bind facade
        $this->app->bind('contact', function ($app) {
            return $this->app->make('Litecms\Contact\Contact');
        });

        // Bind Contact to repository
        $this->registerBindings();

        $this->app->register(\Litecms\Contact\Providers\AuthServiceProvider::class);
        $this->app->register(\Litecms\Contact\Providers\EventServiceProvider::class);
        $this->app->register(\Litecms\Contact\Providers\RouteServiceProvider::class);
    }

    /**
     * Register the bindings for the service provider.
     *
     * @return void
     */
    public function registerBindings()
    {
        // Bind Contact to repository
        $this->app->bind(
            'Litecms\Contact\Interfaces\ContactRepositoryInterface',
            \Litecms\Contact\Repositories\Eloquent\ContactRepository::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['contact'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('litecms/contact.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../resources/views' => base_path('resources/views/vendor/contact')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../resources/lang' => base_path('resources/lang/vendor/contact')], 'lang');

        // Publish public
        $this->publishes([__DIR__ . '/../public' => public_path('/')], 'public');
    }
}
