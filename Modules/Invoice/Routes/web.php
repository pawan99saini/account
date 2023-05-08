<?php
use Modules\Invoice\Http\Controllers\InvoiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteInvoiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('invoice/download/{id}', [InvoiceController::class, 'download']);
    Route::get('invoice/item-download', [InvoiceController::class, 'itemDownload']);
    Route::get('invoice/invoice-items', [InvoiceController::class, 'invoiceItem']);
    Route::post('getBilling', [InvoiceController::class, 'getBilling']);
    Route::post('getParty', [InvoiceController::class, 'getParty']);
    Route::post('getService', [InvoiceController::class, 'getService']);
    Route::post('serviceDetail', [InvoiceController::class, 'serviceDetail']);
    Route::post('changeStatus', [InvoiceController::class, 'changeStatus']);
    Route::get('invoice/download-excel', [InvoiceController::class, 'downloadExcel']);
    Route::resource('invoice', InvoiceController::class,['names' => 'invoice']);
    });
