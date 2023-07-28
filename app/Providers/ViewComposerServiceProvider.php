<?php

namespace App\Providers;

use App\Models\category;
use App\Models\siteInfo;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('public/_layout', function ($view) {
            $categories = category::all();
            $info = siteInfo::all()->first();
            if($info!=null&&$categories!=null){
            $view->with('categories', $categories)->with('info',$info);
            }
            else
            {
                $title="null";
                $view->with('info',$info);
            }
        });

        view()->composer('admin/_layout', function ($view) {
            // Add any admin-specific data if needed
        });
    }
}
