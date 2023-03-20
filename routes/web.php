<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\MessageController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/right',function(){
    return view('website.single');
});

Route::get('/home', [WebsiteController::class, 'home']);


Route::view('contact-us', 'website.contact')->name('contact');
Route::controller(WebsiteController::class)->group(function(){
    Route::get('/',  'home')->name('home');
    Route::get('/posts/{post}', 'show')->name('website.posts.show');
});


//comment routes

Route::post('/comments/create',[CommentController::class, 'create']);
Route::get('/comments/delete/{id}', [CommentController::class, 'delete']);


//images route

Route::get('/image/download/{id}',[ImageController::class, 'download']);

//Message

Route::post('/messages/store', [MessageController::class, 'store']);
Route::get('/messages/show', [MessageController::class, 'show']);
Route::get('/messages/detail/{id}',[MessageController::class, 'detail']);


//Categories

Route::resource('categories', CategoryController::class);
Auth::routes();

//user

Route::get('user', [UserController::class, 'show']); 
Route::post('user',[UserController::class, 'update']);

Route::prefix('auth')->middleware(['auth'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('auth.dashboard')->middleware('auth');

    Route::resource('posts', PostController::class);
});

