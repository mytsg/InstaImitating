<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ItemController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\LikeController;

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
    return view('user.welcome');
});

Route::middleware('auth:users')->group(function(){
    Route::get('/',[ItemController::class,'index'])->name('user.items.index');
});
// ユーザーでログインすれば起こる

Route::resource('items',ItemController::class)
->middleware('auth:users');

Route::get('profile/{id}',[UserController::class,'profile'])->name('profile');

Route::get('/like/{id}',[LikeController::class,'like'])->name('like');
Route::get('/unlike/{id}',[LikeController::class,'unlike'])->name('unlike');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

require __DIR__.'/auth.php';
