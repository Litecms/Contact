<?php

// Routes for contact.
use Illuminate\Support\Facades\Route;

// Guard routes for contact
Route::prefix('{guard}/contact')->group(function () {
    Route::resource('contact', 'ContactResourceController');
});



// Public routes for contact
Route::get('contacts', 'ContactPublicController@index');
Route::get('contact/{slug}.html', 'ContactPublicController@show');
Route::get('contact.htm', 'ContactPublicController@show');
