<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\MailController;

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
Route::get('en', function() {
    session(['locale' => 'en']);
    return back();
});

Route::get('ba', function() {
    session(['locale' => 'ba']);
    return back();
});

Route::get('si', function() {
    session(['locale' => 'si']);
    return back();
});

Route::get('/',[AppController::class,'getApiData']);
Route::get('/home',[AppController::class,'getApiData']);
Route::post('/signup',[AppController::class,'login']);
Route::get('/send-email',[MailController::class,'sendEmail'])->middleware('mailProtect');

Route::get('/logout', function()
{
    if(session()->has('loggedUser')){
        session()->pull('loggedUser');
    }
    return back();
}
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
