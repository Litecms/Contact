<?php

// Admin  routes  for contact
Route::group(['prefix' => '/admin/contact'], function () {
    Route::resource('contact', 'ContactAdminController');
});

Route::get('/contact.htm', 'ContactPublicController@index');
Route::post('contact/sendmail', 'ContactPublicController@sendMail');
