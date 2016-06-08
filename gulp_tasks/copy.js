'use strict';
//TODO:: 需不需要 每次生成都copy?
module.exports = function (elixir, gulp, config, $) {
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
        ]).pipe(concat('simditor.js'))
            .pipe(gulp.dest(paths.vendorJs+"simditor/"));

        gulp.src(paths.modules+"simditor/styles/*.scss")
            .pipe(gulp.dest(paths.vendor+"simditor/scss/"));

        //bootstrap-treeview
        gulp.src(paths.modules+"bootstrap-treeview/src/**")
            .pipe(gulp.dest("resources/assets/vendor/bootstrap-treeview/"));
    });
};