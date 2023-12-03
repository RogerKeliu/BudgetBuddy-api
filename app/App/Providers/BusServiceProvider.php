<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BusServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->resolving(\Core\Query::class, function ($queryInstance, $app) {
            // Get the namespace of the query class
            $namespace = $this->getNamespace(get_class($queryInstance));

            // Now you can use the $namespace variable as needed
        });
    }

    protected function getNamespace($class)
    {
        $reflection = new \ReflectionClass($class);
        return $reflection->getNamespaceName();
    }

    protected function bindQueries()
    {
        // Similar logic for queries if needed
    }
}
