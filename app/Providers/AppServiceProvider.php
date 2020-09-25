<?php

namespace App\Providers;
use App\Models\Channel;
use App\Models\Discussion;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
        //
        View::share('channels',Channel::all());
        view::share('latestDiscussions',Discussion::orderBy('created_at','DESC')->take(3)->get());
        View::share('discussions',Discussion::paginate(12));
    }
}
