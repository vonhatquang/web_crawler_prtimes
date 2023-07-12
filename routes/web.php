<?php

use Illuminate\Support\Facades\Route;
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
//     return view('crawlerData');
// });

Route::get('/', [CrawlerController::class, 'index'])->name('crawler');
Route::post('/crawlerData',[CrawlerController::class,'crawlerProcess'])->name('crawler.process');
