<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsAuthor;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Author\BlogController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthorCategoryController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SliderController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendController::class, 'home']);
Route::get('/blogs', [FrontendController::class, 'blogs']);
Route::get('/blogs/{id}', [FrontendController::class, 'blogDetail']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/contact', [FrontendController::class, 'contact']);

/*
|--------------------------------------------------------------------------
| Dashboard Redirect (Role Based)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = auth()->user();
    if (!$user) return redirect('/login');

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'author') {
        return redirect()->route('author.dashboard');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth',  IsAdmin::class])->group(function () {
    Route::get('/admin/admin-dashboard', [AdminController::class, 'Admindashboard'])->name('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| Author Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth',  IsAuthor::class])->group(function () {
    Route::get('/author/author-dashboard', [AuthorController::class, 'Authordashboard'])->name('author.dashboard');
});

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Additional Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'Admindashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/admin/users/{id}/approve', [AdminController::class, 'approve'])->name('admin.users.approve');
    Route::post('/admin/users/{id}/reject', [AdminController::class, 'reject'])->name('admin.users.reject');
});

/*
|--------------------------------------------------------------------------
| Admin Dashboard Resource Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin-dashboard')
    ->name('admin-dashboard.')
    ->middleware(['auth', IsAdmin::class])
    ->group(function () {
        Route::resource('categories', CategoryController::class);

        Route::get('slider', [SliderController::class, 'index'])->name('slider.index');
        Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('slider/store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
        Route::put('slider/{id}/update', [SliderController::class, 'update'])->name('slider.update');
        Route::delete('slider/{id}/delete', [SliderController::class, 'destroy'])->name('slider.delete');
    });

/*
|--------------------------------------------------------------------------
| Author Blog Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', IsAuthor::class])
    ->prefix('author-dashboard/blogs')
    ->name('author-dashboard.blogs.')
    ->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/', [BlogController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BlogController::class, 'update'])->name('update');
        Route::delete('/{id}', [BlogController::class, 'destroy'])->name('destroy');
    });

/*
|--------------------------------------------------------------------------
| Author Tag Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', IsAuthor::class])
    ->prefix('author-dashboard/tags')
    ->name('author-dashboard.tags.')
    ->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('/create', [TagController::class, 'create'])->name('create');
        Route::post('/', [TagController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [TagController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TagController::class, 'update'])->name('update');
        Route::delete('/{id}', [TagController::class, 'destroy'])->name('destroy');
    });

/*
|--------------------------------------------------------------------------
| Author Comment Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', IsAuthor::class])
    ->prefix('author-dashboard/comments')
    ->name('author-dashboard.comments.')
    ->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('index');
        Route::post('/{id}/approve', [CommentController::class, 'approve'])->name('approve');
        Route::delete('/{id}', [CommentController::class, 'destroy'])->name('destroy');
    });

// Visitor Comment Submission Route (Public)
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');

/*
|--------------------------------------------------------------------------
| Author Category Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', IsAuthor::class])->group(function () {
    Route::get('author-dashboard/categories', [AuthorCategoryController::class, 'index'])->name('author-dashboard.categories.index');
});

/*
|--------------------------------------------------------------------------
| Admin Blog Management
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('blogs', [AdminBlogController::class, 'index'])->name('admin-dashboard.blogs.index');
    Route::get('blogs/create', [AdminBlogController::class, 'create'])->name('admin-dashboard.blogs.create');
    Route::post('blogs/store', [AdminBlogController::class, 'store'])->name('admin-dashboard.blogs.store');
    Route::get('blogs/{blog}/edit', [AdminBlogController::class, 'edit'])->name('admin-dashboard.blogs.edit');
    Route::post('blogs/{blog}/update', [AdminBlogController::class, 'update'])->name('admin-dashboard.blogs.update');
    Route::post('blogs/{blog}/approve', [AdminBlogController::class, 'approve'])->name('admin-dashboard.blogs.approve');
    Route::post('blogs/{blog}/reject', [AdminBlogController::class, 'reject'])->name('admin-dashboard.blogs.reject');
    Route::delete('blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('admin-dashboard.blogs.destroy');
});

require __DIR__ . '/auth.php';
