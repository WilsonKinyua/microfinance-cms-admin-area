<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Services
    Route::apiResource('services', 'ServicesApiController');

    // Contacts
    Route::apiResource('contacts', 'ContactApiController');

    // Home Page Slides
    Route::post('home-page-slides/media', 'HomePageSlidesApiController@storeMedia')->name('home-page-slides.storeMedia');
    Route::apiResource('home-page-slides', 'HomePageSlidesApiController');
});
