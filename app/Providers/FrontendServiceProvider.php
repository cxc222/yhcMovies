<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FrontendServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            config_path().'/frontend.php', 'frontend'
        );
        /*$value = config('frontend.Test');
        print_r($value);
        die;*/
    }
}