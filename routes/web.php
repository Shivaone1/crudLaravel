<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUD\studentController;

Route::get('/', [studentController::class, 'index']);
Route::get('/create', [studentController::class, 'studentCreate']);
Route::post('/store', [studentController::class, 'studentStore']);
Route::GET('/delete/{ID}', [studentController::class, 'studentDelete']);
Route::GET('/edit/{ID}', [studentController::class, 'studentEdit']);
Route::POST('/store-edit', [studentController::class, 'studentEditUpdate']);
