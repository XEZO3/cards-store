<?php

namespace App\Providers;

use App\Models\category;
use App\Models\news;
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
           $news = [];
            if(auth()->check()){
                $news = news::where('id', '>', auth()->user()->latest_seen_news_id)->get();
                if ($news->isNotEmpty()) {
                    $latestNewsId = $news->max('id');
                    auth()->user()->update(['latest_seen_news_id' => $latestNewsId]);
                }
            }
            if($info!=null&&$categories!=null){
            $view->with('categories', $categories)->with('info',$info)->with("news",$news);
            }
            else
            {
                $view->with('info',$info)->with("news",$news);
            }
           
        });

        view()->composer('admin/_layout', function ($view) {
            // Add any admin-specific data if needed
        });
        
    }
}
