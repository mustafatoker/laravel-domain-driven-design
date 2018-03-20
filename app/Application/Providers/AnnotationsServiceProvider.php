<?php

namespace LaravelDDD\Application\Providers;

use Collective\Annotations\Routing\Annotations\Scanner as RouteScanner;
use Collective\Annotations\AnnotationsServiceProvider as ServiceProvider;

/**
 * Class AnnotationsServiceProvider
 * @package LaravelDDD\Application\Providers
 */
class AnnotationsServiceProvider extends ServiceProvider
{
    /**
     * The classes to scan for event annotations.
     *
     * @var array
     */
    protected $scanEvents = [];

    /**
     * The classes to scan for route annotations.
     *
     * @var array
     */
    protected $scanRoutes = [];

    /**
     * The classes to scan for model annotations.
     *
     * @var array
     */
    protected $scanModels = [];

    /**
     * Determines if we will auto-scan in the local environment.
     *
     * @var bool
     */
    protected $scanWhenLocal = true;

    /**
     * Determines whether or not to automatically scan the controllers
     * directory (LaravelDDD\Http\Controllers) for routes
     *
     * @var bool
     */
    protected $scanControllers = false;

    /**
     * Determines whether or not to automatically scan all namespaced
     * classes for event, route, and model annotations.
     *
     * @var bool
     */
    protected $scanEverything = false;

    /**
     * Get the classes to be scanned by the provider.
     *
     * @return array
     */
    public function routeScans()
    {
        return array_merge(
            parent::routeScans(),
            $this->getClassesFromNamespace("LaravelDDD\\Http\\")
        );
    }

    /**
     * Add annotation classes to the route scanner.
     *
     * @param RouteScanner $scanner
     */
    public function addRoutingAnnotations(RouteScanner $scanner)
    {
        $scanner->addAnnotationNamespace('LaravelDDD\Application\Annotations');
    }

    /**
     * Load the scanned application routes.
     *
     * @return void
     */
    protected function loadScannedRoutes()
    {
        $this->app->booted(function () {
            $router = $this->app['Illuminate\Contracts\Routing\Registrar'];

            $router->group(['middleware' => 'web'], function () use ($router) {
                require $this->finder->getScannedRoutesPath();
            });
        });
    }
}