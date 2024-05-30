let mix = require('laravel-mix');

var themename = "travel-explore";

mix.setPublicPath(`assets`);

mix.sass(`src/scss/app.scss`, `assets/css`).sourceMaps();
mix.js(`src/js/app.js`, `assets/js`);

mix.options({
  processCssUrls: false,
  postCss: [require('tailwindcss'), require('autoprefixer')],
});


