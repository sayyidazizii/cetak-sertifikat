<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesInvoiceController;
use App\Http\Controllers\InvItemController;
use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/certificate', [CertificateController::class, 'index'])->name('certificate');
Route::post('/certificate/save', [CertificateController::class, 'processAdd'])->name('save-certificate');
Route::get('/certificate/edit/{certificate_id}', [CertificateController::class, 'edit'])->name('certificate');
Route::post('/certificate/update', [CertificateController::class, 'processEdit'])->name('update-certificate');
Route::get('/certificate/hapus/{certificate_id}', [CertificateController::class, 'delete'])->name('hapus-certificate');
Route::get('/certificate/print/{certificate_id}', [CertificateController::class, 'print'])->name('print-certificate');

