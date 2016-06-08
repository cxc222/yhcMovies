var gulp = require('gulp');
var merge = require('merge-stream');
var minimist = require('minimist');
var path = require('path');
var elixir = require('laravel-elixir');
//require('./elixir-extensions');
var $ = require('gulp-load-plugins')(); //所有gulp插件 $ 前缀命名
$.merge = merge;

/*var rename = require("gulp-rename");
var uglify = require('gulp-uglify');
var rev = require('gulp-rev');
var concat = require('gulp-concat');
var spriter = require('gulp-css-spriter');
var cleanCSS = require('gulp-clean-css');
var urlAdjuster = require('gulp-css-url-adjuster');
var clean = require('gulp-clean');*/

//  gulp --production
/*
var paths = {
    modules: "node_modules/",
    public: "public/",
    build:  "public/build/",
    assets: "resources/assets/",
    vendor: "resources/assets/vendor/",
    vendorCss: "resources/assets/css/vendor/",
    vendorJs: "resources/assets/js/vendor/"
};
*/

global.assets = 'resources/assets/',
    global.Js = assets+'js/',
    global.Css = assets+'css/',
    global.Vendor = assets+'vendor/',
    global.Images = assets+'images/',
    global.public = 'public/',

    global.Build = public+'build/',
    global.build_js = Build+'js/',
    global.build_css = Build+'css/',
    global.ExtendPath = 'node_modules/',
    global.ExportExtendPath = root+'vendor/';

/*var config = require('./config.js');

var taskList = require('fs').readdirSync('./gulp_tasks/');
taskList.forEach(function (file) {
    require('./gulp_tasks/' + file)(elixir, gulp, config, $);
});*/

var jsDeps = {
    // 后台js
    "public/js/backend.js": {
        packages: [
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
    }
}, cssDeps = {
    // 后台 css

};

//var jsDeps = config.jsDeps, cssDeps = config.cssDeps, options = config.options;

elixir(function (mix) {
    var jsPack, cssPack, streams;
    //stream = $.merge(stream, pro);
    /**
     * 处理路径问题
     */
    for (var j in jsDeps){
        var packages = jsDeps[j]['packages'];
        if(packages){
            var _p = [];
            for (var p in packages){
                _p.push(assets+packages[p].toString());
            }
            //清空原有的
            jsDeps[j]['packages'] = _p;
        }
        var str = mix.phpUnit()
            .scripts(
                jsDeps[j]['packages'], j, Js
            );

        var str = gulp.src(packages)
            .pipe($.plumber())
            .pipe($.concat(name))
            .pipe($.uglify())
            .pipe(gulp.dest(pt));
        streams = $.merge(streams, str);
    }

    return streams;

    //console.log(jsDeps);
    for (var j in cssDeps){
        var packages = cssDeps[j]['packages'], _images = cssDeps[j]['images'];
        if(packages){
            var _p = [];
            for (var p in packages){
                _p.push(assets+packages[p]);
            }
            //清空原有的
            cssDeps[j]['packages'] = _p;
        }
        /*if(_images){
            var _i = [];
            for (var i in _images){
                var _imgs = _images[i], __i = [];
                if(typeof _imgs == 'object'){
                    var objImg = {};
                    for (var _img in _imgs){
                        objImg[root+_img] = _imgs[_img];
                        //__i.push(root+_imgs[_img]);
                    }
                    _i.push(objImg);
                }else{
                    _i.push(root+_images[i])
                }
            }
            cssDeps[j]['images'] = _i;
        }*/
    }

    for (var key in jsDeps) {
        var packages = jsDeps[key]['packages'], dest = jsDeps[key]['dest'], debug = jsDeps[key]['debug'],
            name, pt;
        if(!dest){
            dest = Build;
        }
    }


    /*mix.phpUnit()
        .task('copyExtend')
        .task('revision');*/

    /*mix
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
        // backend_vendor - javascript
        .styles(
            [
                'vendor/bootstrap-treeview/css/bootstrap-treeview.css'
            ],
            'public/css/backend_plugin_1.css',
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

        // backend_vendor - javascript
        .scripts(
            [
                'vendor/bootstrap-treeview/js/bootstrap-treeview.js',
            ],
            'public/js/backend_plugin_1.js',
            'resources/assets/'
        )

        .version([
            "public/css/frontend.css",
            "public/js/frontend.js",
            "public/css/backend.css",
            "public/js/backend.js",
            //
            "public/css/backend_plugin_1.css",
            "public/js/backend_plugin_1.js"
        ]);*/
});
