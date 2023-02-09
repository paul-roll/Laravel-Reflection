<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Model::unguard();
        Paginator::useBootstrap();

        Blade::directive('admin', function () {
            return "<?php if (auth()->check() && auth()->user()->isAdmin()) { ?>";
        });

        Blade::directive('endadmin', function () {
            return "<?php } ?>";
        });
        
    }
}
