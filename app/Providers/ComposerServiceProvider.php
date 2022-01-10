<?php

namespace App\Providers;

use App\Models\Wishlist;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('*', function ($view) {
            if (auth()->check()) {
                $val = count(Wishlist::where('user_id', auth()->user()->id)->get());
                $view->with('total_wishlist', $val);
            }
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
