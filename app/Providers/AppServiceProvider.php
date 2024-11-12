<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\CartController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Make the cart item count available in the navigation view
        View::composer('*', function ($view) {
            // Use the CartController's method to get the item count
            $cartController = new CartController();
            $cartItemCount = $cartController->getCartItemCount();
            $view->with('cartItemCount', $cartItemCount);
        });
    }
}
