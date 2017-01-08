<?php

namespace Sapioweb\CannabisReports;

use Illuminate\Support\ServiceProvider;

class CannabisReportsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('CannabisDispensaries');
        $this->app->make('CannabisEdibles');
        $this->app->make('CannabisExtracts');
        $this->app->make('CannabisFlowers');
        $this->app->make('CannabisProducers');
        $this->app->make('CannabisProducts');
        $this->app->make('CannabisSeedCompanies');
        $this->app->make('CannabisStrains');
    }
}
