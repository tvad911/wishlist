<?php

Route::group(['namespace' => 'Botble\Wishlist\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'wishlists', 'as' => 'wishlist.'], function () {
            Route::resource('', 'WishlistController')->parameters(['' => 'wishlist']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'WishlistController@deletes',
                'permission' => 'wishlist.destroy',
            ]);
        });
    });

    if (defined('THEME_MODULE_SCREEN_NAME')) {
        Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
            Route::post('wishlist/make', [
                'as'   => 'public.wishlist.make',
                'uses' => 'PublicController@postMakeWishlist',
            ]);
        });
    }
});