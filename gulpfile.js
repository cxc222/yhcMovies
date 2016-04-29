var gulp = require('gulp');
var sass = require('gulp-sass');
var coffee = require('gulp-coffee');
var concat = require('gulp-concat');
var elixir = require('laravel-elixir');
//require('./elixir-extensions');

//  gulp --production

var paths = {
    modules: "node_modules/",
    public: "public/",
    build:  "public/build/",
    assets: "resources/assets/",
    vendor: "resources/assets/vendor/",
    vendorCss: "resources/assets/css/vendor/",
    vendorJs: "resources/assets/js/vendor/"
};

/**
 * 拷贝扩展文件
 */
gulp.task('copyExtend', function () {

    // bootstrap-sass
    gulp.src(paths.modules+"bootstrap-sass/assets/javascripts/bootstrap.js")
        .pipe(gulp.dest(paths.vendor+"bootstrap/js/"));

    gulp.src(paths.modules+"bootstrap-sass/assets/fonts/**")
        .pipe(gulp.dest(paths.public+"fonts/"))
        .pipe(gulp.dest(paths.build+"fonts/"));

    // Fontawesome
    gulp.src(paths.modules+"font-awesome/fonts/*")
        .pipe(gulp.dest(paths.public+"fonts/"))
        .pipe(gulp.dest(paths.build+"fonts/"));

    // bootstrap-tagsinput
    gulp.src(paths.modules+"bootstrap-tagsinput/dist/bootstrap-tagsinput.css")
        .pipe(gulp.dest(paths.vendor+"bootstrap-tagsinput/css/"));
    gulp.src(paths.modules+"bootstrap-tagsinput/dist/bootstrap-tagsinput.js")
        .pipe(gulp.dest(paths.vendor+"bootstrap-tagsinput/js/"));

    // bootstrap-fileinput
    gulp.src(paths.modules+"bootstrap-fileinput/css/fileinput.css")
        .pipe(gulp.dest(paths.vendor+"bootstrap-fileinput/css/"));
    gulp.src(paths.modules+"bootstrap-fileinput/js/fileinput.js")
        .pipe(gulp.dest(paths.vendor+"bootstrap-fileinput/js/"));
    gulp.src(paths.modules+"bootstrap-fileinput/js/fileinput_locale_zh.js")
        .pipe(gulp.dest(paths.vendor+"bootstrap-fileinput/js/"));
    gulp.src(paths.modules+"bootstrap-fileinput/img/**")
        .pipe(gulp.dest(paths.vendor+"bootstrap-fileinput/img/"));

    //bootstrap-datepicker
    gulp.src(paths.modules+"bootstrap-datepicker/dist/css/bootstrap-datepicker3.css")
        .pipe(gulp.dest("resources/assets/vendor/bootstrap-datepicker/css/"));
    gulp.src(paths.modules+"bootstrap-datepicker/dist/js/bootstrap-datepicker.js")
        .pipe(gulp.dest("resources/assets/vendor/bootstrap-datepicker/js/"));
    gulp.src(paths.modules+"bootstrap-datepicker/js/locales/bootstrap-datepicker.zh-CN.js")
        .pipe(gulp.dest("resources/assets/vendor/bootstrap-datepicker/js/"));

    // simditor
    gulp.src([
        paths.modules+'simditor/site/assets/scripts/module.js',
        paths.modules+'simditor/site/assets/scripts/uploader.js',
        paths.modules+'simditor/site/assets/scripts/hotkeys.js',
        paths.modules+'simditor/site/assets/scripts/simditor.js'
    ])
        .pipe(concat('simditor.js'))
        .pipe(gulp.dest(paths.vendorJs+"simditor/"));
    gulp.src(paths.modules+"simditor/styles/*.scss")
        .pipe(gulp.dest(paths.vendor+"simditor/scss/"));
});

elixir(function (mix) {
    mix
        .phpUnit()
        .task('copyExtend')
        .task('compileAssets')

        .copy(
            'resources/assets/vendor/bootstrap-fileinput/img',
            'public/build/img'
        )

        // frontend - css
        .styles(
            [
                'css/frontend/app.css',
                'css/frontend/style.css'
            ],
            'public/css/frontend.css',
            'resources/assets/'
        )

        // backend - css
        .styles(
            [
                //'vendor/bootstrap.min.css',
                'css/backend/app.css',
                'vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css',
                'vendor/bootstrap-tagsinput/css/bootstrap-tagsinput.css',
                'vendor/bootstrap-fileinput/css/fileinput.css',
                'css/vendor/simditor/simditor.css',
                //'backend/main.css'
            ],
            'public/css/backend.css',
            'resources/assets/'
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
                'vendor/bootstrap/js/bootstrap.js',
                'vendor/bootstrap-datepicker/js/bootstrap-datepicker.js',
                'vendor/bootstrap-fileinput/js/fileinput.js',
                'vendor/bootstrap-tagsinput/js/bootstrap-tagsinput.js',
                'vendor/bootstrap-datepicker/js/bootstrap-datepicker.zh-CN.js',
                'vendor/bootstrap-fileinput/js/fileinput_locale_zh.js',
                'js/vendor/simditor/simditor.js',
                'js/plugin/sweetalert/sweetalert.min.js',
                'js/backend/app.js',
                'js/plugins.js',
                'js/backend/plugin/toastr/toastr.min.js',
                'js/backend/custom.js'
            ],
            'public/js/backend.js',
            'resources/assets/'
        )

        .version([
            "public/css/frontend.css",
            "public/js/frontend.js",
            "public/css/backend.css",
            "public/js/backend.js"
        ]);
});

/**
 * 编译 scss等
 *
 */
gulp.task('compileAssets', function () {
    // simditor
    gulp.src(paths.vendor+"simditor/scss/simditor.scss")
        .pipe(sass())
        .pipe(gulp.dest(paths.vendorCss+"simditor/"));
    // simditor end

});