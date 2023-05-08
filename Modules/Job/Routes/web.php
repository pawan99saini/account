<?php
use Modules\Job\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteJobProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('job/download', [JobController::class, 'download']);
    Route::post('changeJobStatus', [JobController::class, 'changeJobStatus']);
    Route::resource('job', JobController::class,['names' => 'job']);
    });
