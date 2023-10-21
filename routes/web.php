<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\AuthMiddleware;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[BlogController::class,'index'])->middleware('auth');

Route::get('/blogs/{blog:slug}',[BlogController::class,'show'])->middleware(['auth','adminAuth']);

Route::get('/signup',[AuthController::class,'signup']);

Route::post('/signup',[AuthController::class,'register']);

Route::get('/signin',[AuthController::class,'signin']);

Route::post('/signin',[AuthController::class,'login']);

Route::post('/logout',[AuthController::class,'logout']);

Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);

Route::get('/comments/{comment:id}/edit',[CommentController::class, 'edit']);

Route::get('/comments/{comment:id}',[CommentController::class,'destory']);

Route::get('/comments/{comment:id}/update',[CommentController::class,'update']);



// Route::post ("/signup",)

Route::get('/signin',function(){
    return view('components.signin');
});
