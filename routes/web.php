<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

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

Route::get('/', [MyController::class, 'index']);
Route::get('/create_survey', [MyController::class, 'create_survey']);
Route::get('/survey/{id}', [MyController::class, 'view_survey']);
Route::get('/take_answer', [MyController::class, 'chosen_answer']);
Route::get('/admin', [MyController::class, 'surveys_flag_overdue']);
