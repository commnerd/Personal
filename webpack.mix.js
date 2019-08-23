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
mix.extend('quill', webpackConfig => {
    const { rules } = webpackConfig.module;

    // 1. Exclude quill's SVG icons from existing rules
    rules.filter(rule => /svg/.test(rule.test.toString()))
        .forEach(rule => rule.exclude = /quill/);

    // 2. Instead, use html-loader for quill's SVG icons
    rules.unshift({
        test: /\.svg$/,
        include: [path.resolve('./node_modules/quill/assets')],
        loaders: [{ loader: 'html-loader', options: { minimize: true } }]
    });

    // 3. Don't exclude quill from babel-loader rule
    rules.filter(rule => rule.exclude && rule.exclude.toString() === "/(node_modules|bower_components)/")
        .forEach(rule => rule.exclude = /node_modules\/(?!(quill)\/).*/);
});

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .js('resources/assets/food/js/app.js', 'public/js/food')
   .sass('resources/assets/food/sass/app.scss', 'public/css/food')
   .js('resources/assets/admin/js/app.js', 'public/js/admin')
   .sass('resources/assets/admin/sass/app.scss', 'public/css/admin')
   .styles([
       'node_modules/bootstrap-sass-datepicker/css/datepicker.css',
       'node_modules/bootstrap-sass-datepicker/css/datepicker3.css'
   ], 'public/css/admin/etc.css').quill();

if (mix.inProduction()) {
    mix.version();
}
