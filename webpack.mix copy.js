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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

    mix.browserSync({
        proxy: 'localhost:8000'
    });

    mix.browserSync({
        open: false,
        proxy: {
            target: "xampp", // replace with your web server container
            proxyReq: [
                function(proxyReq) {
                    proxyReq.setHeader('HOST', 'localhost:8000'); // replace with your site host and port of BrowserSync
                }
            ]
        }
    })

    mix.browserSync({
        proxy: 'https://' + domain,
        host: domain,
        open: 'external',
        https: {
          key: homedir + '/.config/valet/Certificates/' + domain + '.key',
          cert: homedir + '/.config/valet/Certificates/' + domain + '.crt'
        },
        notify: true, //Enable or disable notifications
    })