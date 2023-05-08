<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\PageController;
//use App\Http\Controllers\PagesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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

Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});


    Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [App\Http\Controllers\PagesController::class, 'index'])->name('dashboard');
    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/my-profile/{id}', [App\Http\Controllers\PagesController::class, 'myProfile'])->name('my-profile');
    Route::post('update-profile/{id}', [App\Http\Controllers\PagesController::class, 'updateProfile'])->name('update-profile');
    Route::post('image_upload', [App\Http\Controllers\PagesController::class, 'image_upload'])->name('image_upload');
});







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
