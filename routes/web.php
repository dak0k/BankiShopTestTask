<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;


Route::get('upload-image', function(){
    return view('upload-image');
});
Route::get('/upload', [ImageController::class, 'showForm'])->name('upload.form');
Route::post('/upload', [ImageController::class, 'upload'])->name('upload.images');
Route::get('/', [ImageController::class, 'index'])->name('images.index');
Route::get('/images/download/{imageId}', [ImageController::class, 'downloadZip'])->name('images.download.zip');
