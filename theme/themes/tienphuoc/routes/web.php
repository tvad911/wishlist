<?php

use Botble\RealEstate\Models\Project;
use Botble\RealEstate\Models\Property;
use Botble\RealEstate\Models\CategoryProperty;

Route::group([
    'middleware' => 'api',
    'prefix'     => 'api/v1',
    'namespace'  => 'Theme\ChangeInteraction\Http\Controllers',
], function () {
    Route::get('search', 'FlexHomeController@getCustomSearch')->name('public.api.search');
});

Route::group(['namespace' => 'Theme\ChangeInteraction\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        
        Route::get('wishlist', 'FlexHomeController@getWishlist')->name('public.wishlist');
        Route::get('share/{key}', 'FlexHomeController@getShareWishlist')->name('public.wishlist.share');
    });

    Theme::routes();

    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        
    });

});