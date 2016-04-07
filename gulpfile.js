var elixir = require('laravel-elixir');
//require('./elixir-extensions');

elixir(function(mix) {
 mix
     .phpUnit()
     //.compressHtml()

    /**
     * Copy needed files from /node directories
     * to /public directory.
     */
     .copy(
       'node_modules/font-awesome/fonts',
       'public/build/fonts/font-awesome'
     )
     .copy(
       'node_modules/bootstrap-sass/assets/fonts/bootstrap',
       'public/build/fonts/bootstrap'
     )
     .copy(
       'node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
       'public/js/vendor/bootstrap'
     )
     .copy(
         'node_modules/simditor/site/assets/styles/',
         'public/js/vendor/simditor/styles'
     )
     .copy(
         'node_modules/simditor/site/assets/scripts/',
         'public/js/vendor/simditor/js'
     )
     .copy(
         'node_modules/simditor/site/assets/images/',
         'public/js/vendor/simditor/images'
     )
     .copy(
         'resources/assets/images/',
         'public/build/images'
     )
     .copy(
         'node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.less',
         '/word/yhcMovies/resources/assets/less/plugin/bootstrap-tagsinput'
     )
     .copy(
         'node_modules/bootstrap-tagsinput/dist/',
         'resources/assets/js/plugin/bootstrap-tagsinput'
     )
     /**
      * Process frontend SCSS stylesheets
      */
     .sass([
        'frontend/app.scss',
        'plugin/sweetalert/sweetalert.scss'
     ], 'resources/assets/css/frontend/app.css')

     /**
      * Combine pre-processed frontend CSS files
      */
     .styles([
        'frontend/app.css',
        'frontend/style.css'
     ], 'public/css/frontend.css')

     /**
      * Combine frontend scripts
      */
     .scripts([
        'plugin/sweetalert/sweetalert.min.js',
        'plugins.js',
        'frontend/app.js',
        'frontend/responsiveslides.min.js',
     ], 'public/js/frontend.js')

     /**
      * Process backend SCSS stylesheets
      */
     .sass([
         'backend/app.scss',
         'backend/plugin/toastr/toastr.scss',
         'plugin/sweetalert/sweetalert.scss'
     ], 'resources/assets/css/backend/app.css')

     .less([
         'plugin/bootstrap-tagsinput/bootstrap-tagsinput.less'
     ], 'resources/assets/css/backend/main.css')

     /**
      * Combine pre-processed backend CSS files
      */
     .styles([
         'backend/app.css',
         'backend/main.css'
     ], 'public/css/backend.css')

     /**
      * Combine backend scripts
      */
     .scripts([
         'plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js',
         'plugin/sweetalert/sweetalert.min.js',
         'plugins.js',
         'backend/app.js',
         'backend/plugin/toastr/toastr.min.js',
         'backend/custom.js'
     ], 'public/js/backend.js')

    /**
      * Apply version control
      */
     .version(["public/css/frontend.css", "public/js/frontend.js", "public/css/backend.css", "public/js/backend.js"]);
});