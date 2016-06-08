'use strict';
var path = require('path');
//var merge = require('merge-stream');
module.exports = function (elixir, gulp, config, $) {
    var jsDeps = config.jsDeps, cssDeps = config.cssDeps, options = config.options;

    // 统一给 资源 加上  root (../static/)
    for (var j in jsDeps){
        var packages = jsDeps[j]['packages'];
        if(packages){
            var _p = [];
            for (var p in packages){
                _p.push(root+packages[p]);
            }
            //清空原有的
            jsDeps[j]['packages'] = _p;
        }
    }

    for (var j in cssDeps){
        var packages = cssDeps[j]['packages'], _images = cssDeps[j]['images'];
        if(packages){
            var _p = [];
            for (var p in packages){
                _p.push(root+packages[p]);
            }
            //清空原有的
            cssDeps[j]['packages'] = _p;
        }
        if(_images){
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
        }
    }
    //end

    /**
     * 处理 js
     *
     */
    gulp.task('js', ['copy'], function () {
        var stream = [];
        for (var key in jsDeps) {
            var packages = jsDeps[key]['packages'], dest = jsDeps[key]['dest'], debug = jsDeps[key]['debug'],
                name, pt;
            if(!dest){
                dest = Build;
            }

            //重新规划路径
            name = path.basename(key);  //文件名
            pt = path.dirname(key);   //路径

            if(pt != '.'){
                pt = dest+pt+'/';
            }else{
                pt = dest;
            }

            if(packages){
                var pro;
                if(options.env == 'dev' || debug){
                    pro = gulp.src(packages)
                        .pipe($.plumber())
                        .pipe($.concat(name))
                        .pipe(gulp.dest(pt));
                }else{
                    pro = gulp.src(packages)
                        .pipe($.plumber())
                        .pipe($.concat(name))
                        .pipe($.uglify())
                        .pipe(gulp.dest(pt));
                }
                stream = $.merge(stream, pro);
            }
        }
        return stream;
    });

    /**
     * css
     *
     */
    gulp.task('css', ['js'], function () {
        var stream = [];
        for (var key in cssDeps) {
            var packages = cssDeps[key]['packages'],
                dest = cssDeps[key]['dest'],
                imgs = cssDeps[key]['images'],
                imgdest = cssDeps[key]['imgdest'], debug = cssDeps[key]['debug'],
                name, pt;
            if(!dest){
                dest = Build;
            }

            //重新规划路径
            name = path.basename(key);  //文件名
            var _pt = path.dirname(key);   //路径

            if(_pt != '.'){
                pt = dest+_pt+'/';
            }else{
                pt = dest;
            }

            if(packages){
                var pro = [];
                if(options.env == 'dev' || debug){
                    pro = gulp.src(packages)
                        .pipe($.concat(name))
                        .pipe(gulp.dest(pt));
                }else{
                    pro = gulp.src(packages)
                        .pipe($.concat(name))
                        .pipe($.minifyCss())
                        .pipe(gulp.dest(pt));
                }
                stream = $.merge(stream, pro);
            }

            if(!imgdest){
                imgdest = Build;
            }

            if(_pt != '.'){
                imgdest = imgdest+_pt+'/';
            }
            if(imgs){
                var _i = [];
                for (var i in imgs){
                    var _is = imgs[i];
                    if(typeof _is == 'object'){
                        for (var _img in _is){
                            //objImg[root+_img] = _imgs[_img];
                            var img = gulp.src(root+_img)
                                .pipe(gulp.dest(imgdest+_is[_img]));
                            stream = $.merge(stream, img);
                        }
                    }else{
                        _i.push(root+imgs[i])
                    }
                }
                if(_i){
                    var img = gulp.src(_i)
                        .pipe(gulp.dest(imgdest));
                    stream = $.merge(stream, img);
                }
            }
        }
        return stream;
    });
    
    /**
     * 添加版本号
     */
    gulp.task('revision', ['css'], function () {
        var revs = [];

        for (var js in jsDeps){
            var jsDest = jsDeps[js]['dest'];
            if(!jsDest){
                jsDest = Build;
            }
            revs.push(jsDest+js);
        }
        for (var css in cssDeps){
            var cssDest = cssDeps[css]['dest'];
            if(!cssDest){
                cssDest = Build;
            }
            revs.push(cssDest+css);
        }

        return gulp.src(revs, {base: Build})
            .pipe($.rev())
            .pipe(gulp.dest(Build))
            .pipe($.rev.manifest({
                merge: true
            }))
            .pipe(gulp.dest(root));
    });
};