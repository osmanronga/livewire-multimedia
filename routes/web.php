<?php

use App\Http\Livewire\Login;
use App\Http\Livewire\Posts;
use App\Http\Livewire\Register;
use App\Http\Livewire\UploadVideos;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\videoController;
use App\Http\Controllers\voiceController;
use App\Http\Controllers\logOutController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\emailResetController;
use App\Http\Controllers\resetPasswordController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});




Route::group(['middleware'=>'guest'], function () {
    Route::get('sendtoken',emailResetController::class);
    Route::get('sendPassword',resetPasswordController::class);

    Route::resource('login',loginController::class);
    Route::resource('register',registerController::class);
});



Route::resource('logout',logOutController::class)->middleware('auth');


Route::resource('video', videoController::class);
Route::resource('voice', voiceController::class);
Route::resource('home', voiceController::class);
