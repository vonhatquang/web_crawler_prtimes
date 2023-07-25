<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedeliveriesController;
use App\Http\Controllers\CrawlerController;

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
//     //return view('redeliveries');
//     //return view('login');
// });
Route::redirect('/', 'login');

// Route::get('/redeliveries', function () {
//     // return view('welcome');
//     //return view('redeliveries');
//     return view('redeliveries');
// });

Route::get('crawler', [CrawlerController::class, 'index'])->name('crawler');
Route::post('crawlerProcessing',[CrawlerController::class,'crawlerProcessing'])->name('crawler.processing');
Route::post('crawlerData',[CrawlerController::class,'crawlerProcess'])->name('crawler.process');

Route::get('redeliveries', [RedeliveriesController::class, 'index'])->name('redeliveries');
Route::post('list-redeliveries', [RedeliveriesController::class, 'listRedeliveries'])->name('redeliveries.list'); 
Route::post('get-redeliveries', [RedeliveriesController::class, 'getRedeliveries'])->name('redeliveries.get'); 
Route::post('post-redeliveries', [RedeliveriesController::class, 'postRedeliveries'])->name('redeliveries.post');
Route::get('redeliveries/{id}', [RedeliveriesController::class, 'editQRRedeliveries']);
Route::post('update-qr-redeliveries', [RedeliveriesController::class, 'updateQRRedeliveries'])->name('redeliveries.updateQR');
Route::post('update-redeliveries', [RedeliveriesController::class, 'updateRedeliveries'])->name('redeliveries.update');
Route::post('delete-redeliveries', [RedeliveriesController::class, 'deleteRedeliveries'])->name('redeliveries.delete');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
