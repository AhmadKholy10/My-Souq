<?php

use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\SettingsController;
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


Route::get('/admin', [IndexController::class, 'index'])-> name('admin');


#############   Settings Routes    ############# 
Route::get('/settings', [SettingsController::class, 'index'])-> name('dashboard.settings.view');
Route::put('/settings/{setting}', [SettingsController::class, 'update'])-> name('dashboard.settings.update');


