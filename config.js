exports.jsDeps = {
    // 后台js
    "adm/js/adm.js": {

        packages: [
            "vendor/bootstrap-datepicker/js/bootstrap-datepicker.js",
            "v2/js/bootstrap-datepicker.zh-CN.js",
            "vendor/bootstrap-fileinput/js/fileinput.js",
            "v2/js/fileinput_locale_zh.js",
            "vendor/select2/js/select2.full.js",
            "plug/select2/js/i18n/zh-CN.js",
            "plug/validform/Validform_v5.3.2_min.js",
            "admin/adm.js"
        ],
    }
}, exports.cssDeps = {
    // 后台 css
    'adm/css/style.css': {
        packages: [
            "vendor/select2/css/select2.css",
            "vendor/bootstrap-fileinput/css/fileinput.css",
            "vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css",
            "admin/style.css"
        ],
        //图片copy
        /*images:[{
            "vendor/bootstrap-fileinput/img/!*.*" : '../img/'
        }]*/
    }
};
