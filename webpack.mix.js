const mix = require('laravel-mix');
const path = require('path');
const tailwindcss = require('tailwindcss');
require('laravel-mix-purgecss');

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

mix.setPublicPath('public')
  .sass('resources/assets/sass/application.scss', 'css')
  .react('resources/assets/ts/app.tsx', 'js')
  .react('resources/assets/ts/admin/backend.ts', 'js')
  .options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
  })
  .webpackConfig({
    output: { chunkFilename: 'js/[name].js?id=[chunkhash]' },
    module: {
      rules: [
        {
          test: /\.tsx?$/,
          loader: "ts-loader",
          exclude: /node_modules/,
        },
      ],
    },
    resolve: {
      extensions: ["*", ".js", ".jsx", ".ts", ".tsx"],
      alias: {
        '@': path.resolve('resources/assets/ts'),
      },
    },
  })
  .sourceMaps();

if (mix.inProduction()) {
  mix.version()
    .purgeCss({
      enabled: true,
      globs: [
        './Themes/backend/views/**/*.blade.php',
        './resources/views/**/*.blade.php',
        './resources/assets/ts/**/*.ts',
        './resources/assets/ts/**/*.tsx',
      ],
      whitelistPatterns: [/nprogress/],
    })
    .options({
      // optimize js minification process
      terser: {
        cache: true,
        parallel: true,
        sourceMap: true,
      },
    });
} else {
  // Uses inline source-maps on development
  mix.webpackConfig({ devtool: 'inline-source-map' });
}
