<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\TypeOperationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('users', UserController::class)->middleware('is_admin');
Route::resource('agencies', AgencyController::class);
Route::resource('statements', StatementController::class);
Route::resource('accounts', AccountController::class);
Route::get('/accounts/{id}/deposit', 'App\Http\Controllers\AccountController@deposit')->name('accounts.deposit');
Route::post('/accounts/{id}/processDeposit', 'App\Http\Controllers\AccountController@processDeposit')->name('accounts.processDeposit');
Route::get('/accounts/{id}/transfer', 'App\Http\Controllers\AccountController@transfer')->name('accounts.trasnfer');
Route::post('/accounts/{id}/processTransfer', 'App\Http\Controllers\AccountController@processTransfer')->name('accounts.processTransfer');
Route::get('/accounts/{id}/summary', 'App\Http\Controllers\AccountController@summary')->name('accounts.summary');



Route::resource('type-operations', TypeOperationController::class)->middleware('is_admin');