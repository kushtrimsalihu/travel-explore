const mix = require('laravel-mix');

mix.setPublicPath('dist')
   .js('src/js/app.js', 'dist/js')
   .js('src/js/carousel.js', 'dist/js')
   .sass('src/sass/app.scss', 'dist/css', {
       implementation: require('sass')
   })
   .options({
       postCss: [require('tailwindcss'), require('autoprefixer')],
       processCssUrls: false
   })
   .version();

mix.webpackConfig({
    watchOptions: {
        ignored: /dist/,
        aggregateTimeout: 300,
        poll: 5000,
    }
});
