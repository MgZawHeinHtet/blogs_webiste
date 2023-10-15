<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Models\Blog;
use App\Models\Category;
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

Route::resource('/blogs',BlogController::class);

Route::get('/blogs/{blog}',[BlogController::class,'show']);

Route::get('/signup',[AuthController::class,'signup']);

Route::post('/signup',[AuthController::class,'register']);

Route::get('/signin',[AuthController::class,'signin']);

Route::post('/signin',[AuthController::class,'login']);

Route::post('/logout',[AuthController::class,'logout']);

// Route::post ("/signup",)

Route::get('/signin',function(){
    return view('components.signin');
});
