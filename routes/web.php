<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\RegisterScheduleController;

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
Route::get('/', [ScheduleController::class, 'list'])->name('home');
Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
Route::get('/schedule/edit/{schedule}', [ScheduleController::class, 'edit'])->name('schedule.edit');
Route::get('/schedule/{details}', [ScheduleController::class, 'detail'])->name('schedule.detail');
Route::post('/schedule/store', [ScheduleController::class, 'store'])->name('schedule.store');
Route::post('/schedule/update/{schedule}', [ScheduleController::class, 'update'])->name('schedule.update');
Route::delete('/schedule/{schedule}', [ScheduleController::class, 'delete'])->name('schedule.delete');
Route::post('/schedule/register/store/{schedule}', [RegisterScheduleController::class, 'store'])->name('schedule.register.player');
//register
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register/store', [RegistRegisterControllerer::class, 'store'])->name('register.store');
