<?php

use App\Http\Controllers\ArbolDecisionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RandomForestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('predecir-diabetes',[ArbolDecisionController::class,'predecirDiabetes'])->name('predecir-diabetes');
Route::get('predecir-dengue',[RandomForestController::class,'predecirdengue'])->name('predecir-dengue');