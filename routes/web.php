<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/upload-file', [FileUploadController::class, 'createForm']);

Route::post('/upload-file', [FileUploadController::class, 'fileUpload'])->name('fileUpload');


Route::get('/audio', 'App\Http\Controllers\FileUploadController@getAudio')->name('test');

require __DIR__.'/auth.php';
