<?php

use Illuminate\Support\Facades\Route;

// Route::group(['namespace' => 'App\Http\Controllers'],function(){

//     Route::get('/','InvoiceController@index')->name('invoices.index');
//     Route::get('/invoices/index','InvoiceController@index')->name('invoices.index');



// });

Route::get('change-language/{locale}','App\Http\Controllers\GeneralController@ChangeLanguage')->name('frontend_change_locale');

Route::resource('invoice', App\Http\Controllers\InvoiceController::class);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
