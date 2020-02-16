<?php

namespace App\Providers;

use App\LandingPage;
use App\Post;
use App\Setting;
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
        $menu=LandingPage::where('in_menu',1)->orderBy('order_number')->get();
        $news=Post::where(['type'=>1,'status'=>1])->orderBy('is_top')->limit(4)->get();
        $projects=Post::where(['type'=>2,'status'=>1])->orderBy('is_top')->limit(4)->get();
        $setting= Setting::find(1);
        View::share('listmenu', $menu);
        View::share('newsHome', $news);
        View::share('projects', $projects);
        View::share('setting', $setting);
        $this->app->alias('bugsnag.logger', \Illuminate\Contracts\Logging\Log::class);
        $this->app->alias('bugsnag.logger', \Psr\Log\LoggerInterface::class);
    }
}
