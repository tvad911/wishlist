<?php


add_shortcode('wishlist-share', 'Wishlist share', 'Wishlist share', function () {
    return Theme::partial('short-codes.wishlist-share');
});