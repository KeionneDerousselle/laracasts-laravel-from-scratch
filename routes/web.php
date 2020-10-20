<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\UserNotificationsController;
use App\Http\Controllers\ConversationsController;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Auth;

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
    return view('welcome');
});

Route::get('/test', function () {
    return view('test', [
        'name' => request('name')
    ]);
});

// Route::get('/posts/{post}', function ($post) {
//     $posts = [
//         'my-first-post' => 'Hello, this is my first blog post!',
//         'my-second-post' => 'Now I am getting the hang of this blogging thing.'
//     ];

//     if (!array_key_exists($post, $posts)) {
//         abort(404, 'Sorry, that post was not found!');
//     }

//     return view('post', [
//         'post' => $posts[$post]
//     ]);
// });

Route::get('/posts/{post}', [PostsController::class, 'show']);

Route::get('/about', function () {
    $articles = App\Models\Article::take(3)->latest()->get();
    return view('about', [
        'articles' => $articles
    ]);
});

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');
Route::post('/articles', [ArticlesController::class, 'store']);
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);
Route::put('/articles/{article}', [ArticlesController::class, 'update']);
// Route::delete('/articles/{article}', [ArticlesController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/payments/create', [PaymentsController::class, 'create'])->middleware('auth')->name('payments.create');
Route::post('/payments', [PaymentsController::class, 'store'])->middleware('auth')->name('payments.store');
Route::get('/notifications', [UserNotificationsController::class, 'show'])->name('userNotifications.show')->middleware('auth');
Route::get('/conversations', [ConversationsController::class, 'index'])->name('conversations.index');
Route::get('/conversations/{conversation}', [ConversationsController::class, 'show'])->name('conversations.show');
Route::patch('/conversations/{conversation}', [ConversationsController::class, 'update'])->name('conversations.update');
Route::get('/roles/welcome', function () {
    return view('roles.welcome');
});
