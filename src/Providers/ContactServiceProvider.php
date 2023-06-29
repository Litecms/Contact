<?php

namespace Litecms\Contact\Providers;

use Illuminate\Support\ServiceProvider;
use Litecms\Contact\Contacts;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'contact');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'contact');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

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
        $this->mergeConfig();
        $this->registerFacade();

        $this->app->register(\Litecms\Contact\Providers\AuthServiceProvider::class);
        $this->app->register(\Litecms\Contact\Providers\RouteServiceProvider::class);
    }

    /**
     * Register the vault facade without the user having to add it to the app.php file.
     *
     * @return void
     */
    public function registerFacade() {
        $this->app->bind('litecms.contact', function($app)
        {
            return $this->app->make(Contact::class);
        });
    }

    /**
     * Merges user's and contact's configs.
     *
     * @return void
     */
    protected function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/config.php', 'litecms.contact'
        );
        
        
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/contact.php', 'litecms.contact.contact'
        );
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['litecms.contact'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/' => config_path('litecms/contact')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/contact')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/contact')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
