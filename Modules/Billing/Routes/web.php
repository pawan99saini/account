<?php
use Modules\Billing\Http\Controllers\BillingController;
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

Route::middleware('auth')->group(function () {
Route::post('fetch-states', [BillingController::class, 'fetchState']);
Route::post('fetch-cities', [BillingController::class, 'fetchCity']);
Route::resource('billing', BillingController::class,['names' => 'billing']);
});
