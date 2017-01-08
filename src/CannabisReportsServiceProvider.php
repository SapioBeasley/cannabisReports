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
        $this->app->make('Sapioweb\CannabisReports\CannabisDispensaries');
        $this->app->make('Sapioweb\CannabisReports\CannabisEdibles');
        $this->app->make('Sapioweb\CannabisReports\CannabisExtracts');
        $this->app->make('Sapioweb\CannabisReports\CannabisFlowers');
        $this->app->make('Sapioweb\CannabisReports\CannabisProducers');
        $this->app->make('Sapioweb\CannabisReports\CannabisProducts');
        $this->app->make('Sapioweb\CannabisReports\CannabisSeedCompanies');
        $this->app->make('Sapioweb\CannabisReports\CannabisStrains');
    }
}
