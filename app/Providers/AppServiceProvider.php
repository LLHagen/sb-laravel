<?php

namespace App\Providers;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        view()->composer('layouts.sidebar', function (View $view) {
            $tagsCloud = Tag::tagsCloud();
            $view->with(compact('tagsCloud'));
        });

        Blade::directive('isAdmin', function () {
            return '<?php $user = Auth::user(); if (!empty($user) && $user->isAdmin()): ?>';
        });
        Blade::directive('elseIsAdmin', function () {
            return "<?php else: ?>";
        });
        Blade::directive('endIsAdmin', function () {
            return "<?php endif; ?>";
        });
    }
}
