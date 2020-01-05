const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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
  .setResourceRoot('../')
  .sass('assets/sass/application.scss', 'css')
  .react('assets/ts/app.ts', 'js')
  .options({
    processCssUrls: false,
    postCss: [ tailwindcss('./tailwind.config.js') ]
  })
  .webpackConfig({
    module: {
      rules: [
        {
          test: /\.tsx?$/,
          loader: "ts-loader",
          exclude: /node_modules/
        }
      ]
    },
    resolve: {
      extensions: ["*", ".js", ".jsx", ".ts", ".tsx"]
    }
  })
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
