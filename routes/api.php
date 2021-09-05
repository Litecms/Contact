<?php

// Web routes  for contact.

// Guard routes for contact
Route::prefix('{guard}/contact')->group(function () {
    Route::resource('contact', 'ContactResourceController');
});



// Public routes for contact
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
            // Guard routes for contact
            Route::prefix('{guard}/contact')->group(function () {
                Route::resource('contact', 'ContactResourceController');
            });
            
            

            // Public routes for contact
            Route::get('contact.htm', 'ContactPublicController@index');
            Route::get('contact/{slug?}', 'ContactPublicController@show');
            Route::post('contact/sendmail', 'ContactPublicController@sendMail');
            
        }
    );
}
