<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Blog;

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
  public function boot()
{
    // Share $pendingUsers variable with all admin-dashboard views
    View::composer('admin-dashboard.*', function ($view) {
        $pendingUsers = User::where('is_approved', false)->count();
        $view->with('pendingUsers', $pendingUsers);
        $view->with('totalAuthors', User::where('role', 'author')->count());
        $view->with('totalBlogs', Blog::count());
    });
}
}
