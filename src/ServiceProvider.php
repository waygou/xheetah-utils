<?php

namespace Waygou\XheetahUtils;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPublishing();
    }

    protected function registerPublishing()
    {
        if (!class_exists('CreateXheetahUtilsSchema')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/../database/migrations/create_xheetah_utils_schema.php.stub' => $this->app->databasePath()."/migrations/{$timestamp}_create_xheetah_schema.php",
            ], 'xheetah-utils-create-schema');
        }

        $this->publishes([
            __DIR__.'/../resources/'     => resource_path('svg/vendor/xheetah-utils/'),
        ], 'xheetah-utils-resources');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
