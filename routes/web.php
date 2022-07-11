<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Author;
use App\Models\Category;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', 
    [
        "title" => "About",
        "active" => 'about',
        "name" => "Luqman Tri Bimantoro",
        "email" => "bijikatul17@gmail.com",
        "image" => "Thumbnail1.png"
    ]);
});

// Halaman Banyak post
Route::get('/posts', [PostController::class, 'index']);
// Halaman single post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Categories many
Route::get('/categories', [CategoryController::class, 'index']);
// Category Single
Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);

// Route::get('/authors', [AuthorController::class, 'index']);
// Route::get('/authors/{author:username}', [AuthorController::class, 'show']);
Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/{user:username}', [AuthorController::class, 'show']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard/posts/{post:slug}')
// Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('auth');
// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');