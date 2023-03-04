<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/user', [usercontroller::class, 'index'])->name('users');
Route::get('/user/create', [PostController::class, 'create'])->name('create');
Route::post('/user/store', [PostController::class, 'store'])->name('store');
Route::post('/store', [PostController::class, 'store'])->name('store');
Route::put('/user/update/edit/{id}',[ usercontroller::class,'edit'])->name('edit');
Route::get('/user/delete/{id}',[ usercontroller::class,'destroy'])->name('delete');
Route::get('/user/editpost/{id}',[ PostController::class,'editp'])->name('editp');
Route::get('/user/{id}',[ usercontroller::class,'show'])->name('show');

Route::put('/user/edit_post/{id}',[ PostController::class,'editpost'])->name('edit_post');



Route::get('/user/delete_post/{id}',[ PostController::class,'destroy'])->name('delete_post');


Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google');

Route::get('/auth/callback', function () {
    $user = Socialite::driver('google')->user();

    // $user->token
})->name('googleback');
