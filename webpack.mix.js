const mix = require('laravel-mix');
const path = require('path');  // Ensure path is required

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
        ignored: [
            path.resolve(__dirname, 'node_modules'),
            path.resolve(__dirname, 'dist'),
            path.resolve(__dirname, 'assets')
        ],
        aggregateTimeout: 300,
        poll: false // Disable polling or adjust the interval
    }
});
