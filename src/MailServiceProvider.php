<?php

namespace Alyahmmed\LaravelMailCampaigns;

use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        if (!file_exists(base_path('config') . '/test.php')) {
            $this->publishes([__DIR__ . '/config' => base_path('config')]);
        }
        $this->publishes([
            //__DIR__ . '/views' => base_path('resources/views/'),
        ]);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
