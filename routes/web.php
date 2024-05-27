<?php

use App\Models\User;
use App\Models\Category;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;


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

// Route::get('/', [LoginController::class, 'index']);
Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'active' => 'home',
    ]);
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home",
        'active' => 'home',
    ]);
});

Route::get('/about', function () {
    return view('aboutUs', [
        "title" => "About Us",
        'active' => 'about',
        "name" => "Jericho"
    ]);
});

Route::get('/community', [PostController::class, 'index'])->middleware('auth');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::orderBy('name')->get()
    ]);
})->middleware('auth');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('partials.choice', [
        'title' => "Category: $category->name",
        'category' => $category,
        'active' => 'categories'
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    $randomNumber = random_int(1, 5);
    return view('community', [
        'title' => "Post By:  $author->name",
        'active' => 'categories',
        "ads" => $randomNumber,
        'posts' => $author->posts->load('category', 'author'),
    ]);
});
// Route::get('/chat/{category:slug}',function (Category $category){
//     return view('publicChat', [
//         'category' => $category->name,
//         'user' => Auth::user()
//     ]);
// });

// Route::post('/send-message', function (Request $request) {
//     $message = $request->input('message');
//     $user = $request->input('user');

//     event(new MessageSent($user, $message));

//     return response()->json(['status' => 'Message Sent!']);
// });

// Route::post('/send-message', [ChatController::class, 'sendMessage']);

Route::get('/chat/{category}', [ChatController::class, 'showChat'])->middleware('auth');
Route::post('/send-message/{category}', [ChatController::class, 'sendMessage']);
Route::post('/delete-messages/{category}', [ChatController::class, 'deleteMessages']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', CategoryController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/user/order', OrderController::class)->except('show')->middleware('auth');

Route::post('/ads', [AdsController::class, 'store'])->name('ads.store');
Route::get('/dashboard/ads/active', [AdsController::class, 'index'])->middleware('auth');

Route::get('/dashboard/order/rejected', [OrderController::class, 'rejected'])->middleware('auth');
Route::get('/dashboard/order/history', [OrderController::class, 'history'])->middleware('auth');
