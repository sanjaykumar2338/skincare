<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GetQuoteController;
use App\Http\Controllers\MainController;


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

//Home controller 
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/aboutus', [MainController::class, 'aboutus']);
Route::get('/updates', [MainController::class, 'updates']);
Route::get('/testimonial', [MainController::class, 'testimonial']);
Route::get('/gallery', [MainController::class, 'gallery']);
Route::get('/updates', [MainController::class, 'update']);
Route::get('/contact', [GetQuoteController::class, 'contact_us']);
Route::post('/contact-us-save', [GetQuoteController::class, 'contact_us_save']);
Route::post('/subscribe_newletter', [MainController::class, 'subscribe_newletter']);