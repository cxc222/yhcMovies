var gulp = require('gulp');
var elixir = require('laravel-elixir');
//require('./elixir-extensions');

gulp.task('copy', function () {

    // bootstarp
    gulp.src("vendor/bower/bootstrap/dist/css/bootstrap.min.css")
        .pipe(gulp.dest("resources/assets/css/vendor/"));
    gulp.src("vendor/bower/bootstrap/dist/js/bootstrap.min.js")
        .pipe(gulp.dest("resources/assets/js/vendor/"));

    // Fontawesome
    /*gulp.src("vendor/bower/font-awesome/css/font-awesome.min.css")
        .pipe(gulp.dest("resources/assets/css/vendor/"));*/
    gulp.src("vendor/bower/font-awesome/fonts/*")
        .pipe(gulp.dest("public/fonts/"))
        .pipe(gulp.dest("public/build/fonts/"));

    // bootstrap-tagsinput
    gulp.src("vendor/bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.css")
        .pipe(gulp.dest("resources/assets/css/vendor/"));
    gulp.src("vendor/bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js")
        .pipe(gulp.dest("resources/assets/js/vendor/"));

    // bootstrap-fileinput
    gulp.src("vendor/bower/bootstrap-fileinput/css/fileinput.min.css")
        .pipe(gulp.dest("resources/assets/css/vendor/"));
    gulp.src("vendor/bower/bootstrap-fileinput/js/fileinput.min.js")
        .pipe(gulp.dest("resources/assets/js/vendor/"));
    gulp.src("vendor/bower/bootstrap-fileinput/js/fileinput_locale_zh.js")
        .pipe(gulp.dest("resources/assets/js/vendor/"));
    //::TODO 图片怎么同步

    //bootstrap-datepicker
    gulp.src("vendor/bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")
        .pipe(gulp.dest("resources/assets/css/vendor/"));
    gulp.src("vendor/bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")
        .pipe(gulp.dest("resources/assets/js/vendor/"));
    gulp.src("vendor/bower/bootstrap-datepicker/dist/locales/bootstrap-datepicker.zh-CN.min.js")
        .pipe(gulp.dest("resources/assets/js/vendor/"));

    // simditor
    gulp.src("vendor/bower/simple-module/lib/module.js")
        .pipe(gulp.dest("resources/assets/js/vendor/simditor/"));
    gulp.src("vendor/bower/simple-hotkeys/lib/hotkeys.js")
        .pipe(gulp.dest("resources/assets/js/vendor/simditor/"));
    gulp.src("vendor/bower/simple-uploader/lib/uploader.js")
        .pipe(gulp.dest("resources/assets/js/vendor/simditor/"));
    gulp.src("vendor/bower/simditor/lib/simditor.js")
        .pipe(gulp.dest("resources/assets/js/vendor/simditor/"));
    gulp.src("vendor/bower/simditor/styles/simditor.css")
        .pipe(gulp.dest("resources/assets/css/vendor/simditor/"));
});

elixir(function (mix) {

    mix
        .phpUnit()

        .sass([
            'backend/app.scss',
            'backend/plugin/toastr/toastr.scss',
            'plugin/sweetalert/sweetalert.scss'
        ], 'resources/assets/css/backend/app.css')

        /**
         * Process frontend SCSS stylesheets
         */
        .sass([
            'frontend/app.scss',
            'plugin/sweetalert/sweetalert.scss'
        ], 'resources/assets/css/frontend/app.css')

        // frontend - css
        .styles(
            [
                'frontend/app.css',
                'frontend/style.css'
            ],
            'public/css/frontend.css',
            'resources/assets/css/'
        )

        // backend - css
        .styles(
            [
                //'vendor/bootstrap.min.css',
                'backend/app.css',
                'vendor/bootstrap-datepicker.min.css',
                'vendor/bootstrap-tagsinput.css',
                'vendor/fileinput.min.css',
                'backend/main.css'
            ],
            'public/css/backend.css',
            'resources/assets/css/'
        )

        // all
        .styles(
            [
                'vendor/simditor/simditor.css',
            ],
            'public/css/simditor.min.css',
            'resources/assets/css/'
        )
        .scripts(
            [
                'vendor/simditor/module.js',
                'vendor/simditor/hotkeys.js',
                'vendor/simditor/uploader.js',
                'vendor/simditor/simditor.js'
            ],
            'public/js/simditor.min.js',
            'resources/assets/js/'
        )

        // frontend.js
        .scripts(
            [
                'plugin/sweetalert/sweetalert.min.js',
                'plugins.js',
                'frontend/app.js',
                'frontend/responsiveslides.min.js',
            ],
            'public/js/frontend.js',
            'resources/assets/js/'
        )

        // backend - javascript
        .scripts(
            [
                'vendor/bootstrap.min.js',
                'vendor/bootstrap-tagsinput.min.js',
                'vendor/fileinput.min.js',
                'vendor/fileinput_locale_zh.js',
                'vendor/bootstrap-tagsinput.min.js',
                'vendor/bootstrap-datepicker.min.js',
                'vendor/bootstrap-datepicker.zh-CN.min.js',
                'plugin/sweetalert/sweetalert.min.js',
                'plugins.js',
                'backend/app.js',
                'backend/plugin/toastr/toastr.min.js',
                'backend/custom.js'
            ],
            'public/js/backend.js',
            'resources/assets/js/'
        )

        .version([
            "public/css/frontend.css",
             "public/js/frontend.js",
             "public/css/backend.css",
            "public/js/backend.js"
        ]);
});