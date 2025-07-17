<?php

namespace App\Providers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

          View::composer('*', function ($view) {
        $cartCount = 0;
if(Session::has('user'))
    {
  $cartCount = cart::where('user_id', session()->get('user')['id'])->count();

    }

        $view->with('cartItemCount', $cartCount);
    });
    }
}
