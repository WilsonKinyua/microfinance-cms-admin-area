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

    // Blogs
    Route::post('blogs/media', 'BlogApiController@storeMedia')->name('blogs.storeMedia');
    Route::apiResource('blogs', 'BlogApiController');

    // About Our Companies
    Route::post('about-our-companies/media', 'AboutOurCompanyApiController@storeMedia')->name('about-our-companies.storeMedia');
    Route::apiResource('about-our-companies', 'AboutOurCompanyApiController');

    // Why Choose Our Companies
    Route::post('why-choose-our-companies/media', 'WhyChooseOurCompanyApiController@storeMedia')->name('why-choose-our-companies.storeMedia');
    Route::apiResource('why-choose-our-companies', 'WhyChooseOurCompanyApiController');

    // Teams
    Route::apiResource('teams', 'TeamApiController');

    // Testimonies
    Route::post('testimonies/media', 'TestimoniesApiController@storeMedia')->name('testimonies.storeMedia');
    Route::apiResource('testimonies', 'TestimoniesApiController');

    // Home Page Slides
    Route::post('home-page-slides/media', 'HomePageSlidesApiController@storeMedia')->name('home-page-slides.storeMedia');
    Route::apiResource('home-page-slides', 'HomePageSlidesApiController');

    // Social Media Links
    Route::apiResource('social-media-links', 'SocialMediaLinksApiController');
});
