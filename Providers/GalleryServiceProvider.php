<?php namespace Modules\Gallery\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;

class GalleryServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    public function boot()
    {
        $this->publishConfig('gallery', 'config');
        $this->publishConfig('gallery', 'permissions');
        $this->publishConfig('gallery', 'settings');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'asgard.gallery.config');
        $this->publishes([__DIR__ . '/../Config/config.php' => config_path('asgard.gallery.config' . '.php'), ], 'config');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Gallery\Repositories\GalleryRepository',
            function () {
                $repository = new \Modules\Gallery\Repositories\Eloquent\EloquentGalleryRepository(new \Modules\Gallery\Entities\Gallery());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Gallery\Repositories\Cache\CacheGalleryDecorator($repository);
            }
        );
// add bindings

    }
}
