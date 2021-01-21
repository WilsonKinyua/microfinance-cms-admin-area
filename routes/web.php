<?php

// Route::redirect('/', 'login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServicesController');

    // Contacts
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // Blogs
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::resource('blogs', 'BlogController');

    // About Our Companies
    Route::delete('about-our-companies/destroy', 'AboutOurCompanyController@massDestroy')->name('about-our-companies.massDestroy');
    Route::post('about-our-companies/media', 'AboutOurCompanyController@storeMedia')->name('about-our-companies.storeMedia');
    Route::post('about-our-companies/ckmedia', 'AboutOurCompanyController@storeCKEditorImages')->name('about-our-companies.storeCKEditorImages');
    Route::resource('about-our-companies', 'AboutOurCompanyController');

    // Why Choose Our Companies
    Route::delete('why-choose-our-companies/destroy', 'WhyChooseOurCompanyController@massDestroy')->name('why-choose-our-companies.massDestroy');
    Route::post('why-choose-our-companies/media', 'WhyChooseOurCompanyController@storeMedia')->name('why-choose-our-companies.storeMedia');
    Route::post('why-choose-our-companies/ckmedia', 'WhyChooseOurCompanyController@storeCKEditorImages')->name('why-choose-our-companies.storeCKEditorImages');
    Route::resource('why-choose-our-companies', 'WhyChooseOurCompanyController');

    // Teams
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Testimonies
    Route::delete('testimonies/destroy', 'TestimoniesController@massDestroy')->name('testimonies.massDestroy');
    Route::post('testimonies/media', 'TestimoniesController@storeMedia')->name('testimonies.storeMedia');
    Route::post('testimonies/ckmedia', 'TestimoniesController@storeCKEditorImages')->name('testimonies.storeCKEditorImages');
    Route::resource('testimonies', 'TestimoniesController');

    // Home Page Slides
    Route::delete('home-page-slides/destroy', 'HomePageSlidesController@massDestroy')->name('home-page-slides.massDestroy');
    Route::post('home-page-slides/media', 'HomePageSlidesController@storeMedia')->name('home-page-slides.storeMedia');
    Route::post('home-page-slides/ckmedia', 'HomePageSlidesController@storeCKEditorImages')->name('home-page-slides.storeCKEditorImages');
    Route::resource('home-page-slides', 'HomePageSlidesController');

    // Social Media Links
    Route::delete('social-media-links/destroy', 'SocialMediaLinksController@massDestroy')->name('social-media-links.massDestroy');
    Route::resource('social-media-links', 'SocialMediaLinksController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


// Frontend


// Route::resource('/', 'HomePageController');
Route::get('/', 'HomePageController@index')->name('home.page');
Route::get('about', 'HomePageController@about')->name('company.about');
Route::get('services', 'HomePageController@services')->name('company.services');
Route::get('blog', 'HomePageController@blog')->name('company.blog');
Route::get('contact', 'HomePageController@contact')->name('company.contact');
Route::get('apply', 'HomePageController@apply')->name('company.apply');
// Route::get('apply', 'HomePageController@apply')->name('company.apply');

