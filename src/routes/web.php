<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TimestampsController;
use App\Http\Controllers\AttendanceController;


Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [TimestampsController::class, 'stamp'])->name('stamp');
    Route::post('/start_time', [TimestampsController::class, 'start_time'])->name('timestamp/start_time');
    Route::post('/break_start', [TimestampsController::class, 'break_start'])->name('timestamp/break_start');
    Route::post('/break_end', [TimestampsController::class, 'break_end'])->name('timestamp/break_end');
    Route::post('/end_time', [TimestampsController::class, 'end_time'])->name('timestamp/end_time');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
});
Route::get('/previous-day', 'AttendanceController@previousDay')->name('previous_day_route');
Route::get('/next-day', 'AttendanceController@nextDay')->name('next_day_route');