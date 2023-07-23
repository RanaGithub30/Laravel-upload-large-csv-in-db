<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordsUploadController;

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

Route::get('upload-file', [RecordsUploadController::class, 'upload_file'])->name('upload.file');
Route::post('upload', [RecordsUploadController::class, 'upload'])->name('upload');
Route::get('store-file', [RecordsUploadController::class, 'store'])->name('store.file');