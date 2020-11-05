<?php

use App\Http\Controllers\DiscussionsController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\Route;



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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('discussions',DiscussionsController::class);
Route::post('discussions/upload', [DiscussionsController::class,'upload'])->name('discussions.upload');
Route::resource('discussions/{discussion}/replies',RepliesController::class);
Route::resource('gallery',GalleryController::class);
Route::resource('certificates',CertificateController::class);
Route::post('/send-email',[MailController::class,'sendEmail'])->name('send-email');;
