<?php

return [
    [
        'name' => 'Wishlists',
        'flag' => 'wishlist.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'wishlist.create',
        'parent_flag' => 'wishlist.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'wishlist.edit',
        'parent_flag' => 'wishlist.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'wishlist.destroy',
        'parent_flag' => 'wishlist.index',
    ],
];
