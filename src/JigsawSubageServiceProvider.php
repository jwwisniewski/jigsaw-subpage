<?php

namespace jwwisniewski\Jigsaw\Subpage;

use Illuminate\Support\ServiceProvider;
use jwwisniewski\Jigsaw\Core\Jigsaw;
use jwwisniewski\Jigsaw\Core\Module;

class JigsawSubageServiceProvider extends ServiceProvider
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
    public function boot(Jigsaw $jigsaw)
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadViewsFrom(__DIR__.'/../views/admin', 'jigsaw-subpage-admin');
        $this->loadViewsFrom(__DIR__.'/../views/client', 'jigsaw-subpage-client');
        $this->publishes([
            __DIR__.'/../views/client' => resource_path('views/vendor/jigsaw-subpage-client'),
        ], ['jigsaw-subpage', 'jigsaw-client']);

        $this->loadTranslationsFrom(__DIR__.'/../translations', 'jigsaw-subpage');

        $jigsaw->registerModule(Subpage::class, 'subpage', 'subpage.index', Module::NOT_INSTANTIABLE);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
    }
}
