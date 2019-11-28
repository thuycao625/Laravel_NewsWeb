<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; 
use App\Category;
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
        Schema::defaultStringLength(191); //NEW: Increase StringLength
        view()->composer('user.pages.header',function($view){ 
           $cate = Category::select('id','name')->get()->toArray();
          $view->with('cate',$cate);              
        });
        view()->composer('user.pages.footer',function($view){ 
           $cate = Category::select('id','name')->get()->toArray();
          $view->with('cate',$cate);              
        });  
    }
}
