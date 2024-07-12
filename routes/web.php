<?php

use App\Http\Controllers\IjazahController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard');
// });
// Route::get('/welcome', function () {
//     return view('welcome');
// });
Route::get('/', [IjazahController::class, 'index'])->name('cari');
Route::post('/detail', [IjazahController::class, 'detail']);
Route::get('/tes', [IjazahController::class, 'tes']);
Route::get('/get-alumni', [IjazahController::class, 'getAlumni']);
