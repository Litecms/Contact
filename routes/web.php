<?php

// Admin  routes  for contact
Route::group(['prefix' => set_route_guard('web').'/contact'], function () {
    Route::resource('contact', 'ContactResourceController');
});

Route::get('contact.htm', 'ContactPublicController@index');
Route::post('contact/sendmail', 'ContactPublicController@sendMail');
