const mix = require('laravel-mix');

const outputDir = mix.inProduction() ? 'dist' : 'assets';

mix.setPublicPath(outputDir);

mix.js('src/js/app.js', `${outputDir}/js`);

mix.sass('src/sass/app.scss', `${outputDir}/css`, {
    implementation: require('sass')
})
.options({
    postCss: [require('tailwindcss'), require('autoprefixer')],
    processCssUrls: false
});


if (mix.inProduction()) {
    mix.version();
}

mix.webpackConfig({
    watchOptions: {
        ignored: /node_modules/,
        aggregateTimeout: 300,
        poll: 5000,
    }
});
