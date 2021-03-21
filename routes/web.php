<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Advertisements\CreateAdvertisementController;
use App\Http\Controllers\Advertisements\DeleteAdvertisementController;
use App\Http\Controllers\Advertisements\AdvertisementDetailsController;
use App\Http\Controllers\Advertisements\EditAdvertisementController;
use App\Http\Controllers\Advertisements\CreateBidsController;
use App\Http\Controllers\Advertisements\AdvertisementsController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'index'])->name('search');
Route::post('/', [AdvertisementsController::class, 'filter']);
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/advertisements/create', [CreateAdvertisementController::class, 'index']);
Route::get('/advertisements/edit/{id}', [EditAdvertisementController::class, 'index']);
Route::get('/advertisements/{id}', [AdvertisementDetailsController::class, 'index']);
Route::post('/advertisements/create/post', [CreateAdvertisementController::class, 'create']);
Route::post('/advertisements/bids/post', [CreateBidsController::class, 'create']);
Route::post('/advertisements/update/{id}', [EditAdvertisementController::class, 'edit']);
Route::delete('/advertisements/delete/{id}', [DeleteAdvertisementController::class, 'delete']);
Auth::routes(['verify' => true]);
