const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js//app.js', 'public/js')
  .sass('resources/sass/theme/admin/app.scss', 'public/css/admin')
  .sass('resources/sass/theme/client/app.scss', 'public/css/client');

mix.copyDirectory('node_modules/tinymce/plugins', 'public/node_modules/tinymce/plugins');
mix.copyDirectory('node_modules/tinymce/skins', 'public/node_modules/tinymce/skins');
mix.copyDirectory('node_modules/tinymce/themes', 'public/node_modules/tinymce/themes');

if (mix.inProduction()) {
  mix.sourceMaps(false).version();
} else {
  mix.sourceMaps(true);
}
