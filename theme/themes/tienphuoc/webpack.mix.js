let mix = require('laravel-mix');

let directory = 'tienphuoc'

const source = 'platform/themes/' + directory;
const dist = 'public/themes/' + directory;

mix
    .sass(source + '/assets/sass/style.scss', dist + '/css')
    .copy(dist + '/css/style.css', source + '/public/css')

    .copy(dist + '/css/main.css', source + '/public/css')
    .js(source + '/assets/js/app.js', dist + '/js')
    .copy(dist + '/js/app.js', source + '/public/js')

    .js(source + '/assets/js/components.js', dist + '/js')
    .copy(dist + '/js/components.js', source + '/public/js')

    .js(source + '/assets/js/properties.js', dist + '/js')
    .copy(dist + '/js/properties.js', source + '/public/js')

    .js(source + '/assets/js/main.js', dist + '/js')
    .copy(dist + '/js/main.js', source + '/public/js')

    .js(source + '/assets/js/form.js', dist + '/js')
    .copy(dist + '/js/form.js', source + '/public/js')

    .js(source + '/assets/js/language.js', dist + '/js')
    .copy(dist + '/js/language.js', source + '/public/js')

    .js(source + '/assets/js/services.js', dist + '/js')
    .copy(dist + '/js/services.js', source + '/public/js')

    .js(source + '/assets/js/search-properties.js', dist + '/js')
    .copy(dist + '/js/search-properties.js', source + '/public/js')

    .js(source + '/assets/js/wishlist.js', dist + '/js')
    .copy(dist + '/js/wishlist.js', source + '/public/js')

    .copy(source + '/assets/js/i18n/', dist + '/js/i18n');