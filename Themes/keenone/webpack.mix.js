let mix = require('laravel-mix');

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

mix.setPublicPath('./assets/public')
  .sass('assets/sass/style.scss', 'css')
  .react([
    'assets/js/base/before.js',
    'assets/js/app.js',
    'assets/js/base/after.js'
  ], 'js/app.js')
  .options({ processCssUrls: false })
  .sourceMaps();

if (mix.inProduction()) {
  mix.version()
    .options({
      // optimize js minification process
      terser: {
        cache: true,
        parallel: true,
        sourceMap: true
      }
    });
} else {
  // Uses inline source-maps on development
  mix.webpackConfig({ devtool: 'inline-source-map' });
}
