<?php
use Modules\Party\Http\Controllers\PartyController;
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
Route::get('parties/view', [PartyController::class, 'viewParties']);

Route::resource('parties', PartyController::class,['names' => 'parties']);
});
