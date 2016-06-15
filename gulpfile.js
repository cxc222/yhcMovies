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

     /**
      * copy 到内部 vendor文件夹
      */
     .copy(
         [
             'node_modules/simditor/lib/simditor.js',
             'node_modules/simple-hotkeys/lib/hotkeys.js',
             'node_modules/simple-module/lib/module.js',
             'node_modules/simple-uploader/lib/uploader.js',
         ],
         'resources/assets/js/vendor/simditor/'
         //'public/js/vendor/simditor'
     )
     .copy(
         'node_modules/simditor/styles/simditor.css',
         'resources/assets/css/vendor/simditor'
         //'public/css/vendor/simditor'
     )

     .copy(
         [
             'node_modules/bootstrap-fileinput/js/fileinput.js',
             'node_modules/bootstrap-fileinput/js/fileinput_locale_zh.js'
         ],
         'resources/assets/js/vendor/bootstrap-fileinput/'
     )
     .copy(
         'node_modules/bootstrap-fileinput/css/fileinput.css',
         'resources/assets/css/vendor/bootstrap-fileinput/'
     )
     .copy(
         'node_modules/bootstrap-fileinput/img/**',
         'public/vendor/bootstrap/img/'
     )

     .copy([
         'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
         'node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.zh-CN.min.js',
        ], 'resources/assets/js/vendor/bootstrap-datepicker/'
     )

     .copy(
         'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css',
         'resources/assets/css/vendor/bootstrap-fileinput/'
     )

     .copy(
         'node_modules/bootstrap-treeview/src/css/bootstrap-treeview.css',
         'resources/assets/css/vendor/bootstrap-treeview/'
     )

     .copy(
         'node_modules/bootstrap-treeview/src/js/bootstrap-treeview.js',
         'resources/assets/js/vendor/bootstrap-treeview/'
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
        'frontend/style.css'
     ], 'public/css/frontend.css')

     /**
      * Combine frontend scripts
      */
     .scripts([
        'plugin/sweetalert/sweetalert.min.js',
        'plugins.js',
        'frontend/app.js'
     ], 'public/js/frontend.js')

     /**
      * Process backend SCSS stylesheets
      */
     .sass([
         'backend/app.scss',
         'backend/plugin/toastr/toastr.scss',
         'plugin/sweetalert/sweetalert.scss'
     ], 'resources/assets/css/backend/app.css')

     /**
      * Combine pre-processed backend CSS files
      */
     .styles([
         'backend/app.css'
     ], 'public/css/backend.css')

     .styles([
         'vendor/simditor/simditor.css'
     ], 'public/vendor/simditor/css/simditor.css')

     .styles([
         'vendor/bootstrap-fileinput/bootstrap-datepicker3.css'
     ], 'public/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')

     .styles([
         'vendor/bootstrap-fileinput/fileinput.css'
     ], 'public/vendor/bootstrap-fileinput/css/fileinput.css')

     .styles([
         'vendor/bootstrap-treeview/bootstrap-treeview.css'
     ], 'public/vendor/bootstrap-treeview/css/bootstrap-treeview.css')

     .scripts([
         'vendor/simditor/module.js',
         'vendor/simditor/uploader.js',
         'vendor/simditor/hotkeys.js',
         'vendor/simditor/simditor.js',
     ], 'public/vendor/simditor/js/simditor.js')

     .scripts([
         'vendor/bootstrap-fileinput/fileinput.js',
         'vendor/bootstrap-fileinput/fileinput_locale_zh.js',
     ], 'public/vendor/bootstrap-fileinput/js/fileinput.js')

     .scripts([
         'vendor/bootstrap-datepicker/bootstrap-datepicker.js',
         'vendor/bootstrap-datepicker/bootstrap-datepicker.zh-CN.min.js',
     ], 'public/vendor/bootstrap-fileinput/js/bootstrap-datepicker.js')

     .scripts(
         'vendor/bootstrap-treeview/bootstrap-treeview.js',
         'public/vendor/bootstrap-treeview/js/bootstrap-treeview.js')

     /**
      * Combine backend scripts
      */
     .scripts([
         'plugin/sweetalert/sweetalert.min.js',
         'plugins.js',
         'backend/app.js',
         'backend/plugin/toastr/toastr.min.js',
         'backend/custom.js'
     ], 'public/js/backend.js')

    /**
      * Apply version control
      */
     .version([
         "public/css/frontend.css",
         "public/js/frontend.js",
         "public/css/backend.css",
         "public/js/backend.js",

         "public/vendor/simditor/js/simditor.js",
         "public/vendor/simditor/css/simditor.css",
         "public/vendor/bootstrap-fileinput/js/fileinput.js",
         "public/vendor/bootstrap-fileinput/css/fileinput.css",
         "public/vendor/bootstrap-fileinput/js/bootstrap-datepicker.js",
         "public/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css",
         "public/vendor/bootstrap-treeview/css/bootstrap-treeview.css",
         "public/vendor/bootstrap-treeview/js/bootstrap-treeview.js",
     ]);
});