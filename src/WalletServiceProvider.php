<?php

namespace Deesynertz\Wallet;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class WalletServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        // $this->loadViewsFrom(__DIR__.'/./../resources/views', 'views');
        // dd('location added');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPublishables();
    }

    private function registerPublishables() 
    {
        $basePath = __DIR__;
        $arrPublishable = [
            'deesynertz-wallet-config' => [
                "$basePath/publishable/config/wallet.php" => config_path('wallet.php'),
            ],
            'deesynertz-wallet-migrations' => [
                "$basePath/publishable/database/migrations" => database_path('migrations'),
            ],
            'deesynertz-wallet-helpers' => [
                "$basePath/publishable/helpers" =>  app_path('Helpers'),
            ]
        ];

        foreach ($arrPublishable as $group => $paths) {
            $this->publishes($paths, $group);
        }
    }
}

// 'deesynertz-wallet-services' => [
//     "$basePath/publishable/services" =>  app_path('Services'),
// ],