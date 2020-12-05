<?php

// Admin  routes  for contact
Route::group(['prefix' => '{guard}/contact'], function () {
    Route::resource('contact', 'ContactResourceController');
});

Route::get('contact.htm', 'ContactPublicController@index');
Route::get('contact/{slug?}', 'ContactPublicController@show');
Route::post('contact/sendmail', 'ContactPublicController@sendMail');

if (Trans::isMultilingual()) {
    Route::group(
        [
            'prefix' => '{trans}',
            'where'  => ['trans' => Trans::keys('|')],
        ],
        function () {
            Route::group(['prefix' => '{guard}/contact'], function () {
                Route::resource('contact', 'ContactResourceController');
            });

            Route::get('contact.htm', 'ContactPublicController@index');
            Route::post('contact/sendmail', 'ContactPublicController@sendMail');

        }
    );
}
