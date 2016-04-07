<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'dashboard' => '控制面板',
        'access' => [
            'title' => '权限管理',

            'permissions' => [
                'all' => '所有权限',
                'create' => '创建权限',
                'edit' => '编辑权限',
                'groups' => [
                    'all' => '所有分组',
                    'create' => '创建分组',
                    'edit' => '编辑分组',
                    'main' => '分组',
                ],
                'main' => '权限',
                'management' => '权限管理',
            ],

            'roles' => [
                'all' => '所有角色',
                'create' => '创建角色',
                'edit' => '编辑角色',
                'management' => '角色管理',
                'main' => '角色',
            ],

            'users' => [
                'all' => '所有用户',
                'change-password' => '修改密码',
                'create' => '创建用户',
                'deactivated' => '已停用用户',
                'deleted' => '已删除用户',
                'edit' => '编辑用户',
                'main' => '用户',
            ],
        ],
        
        'cms' => [
            'title' => '文章管理'
        ],

        'log-viewer' => [
            'main' => '日志浏览',
            'dashboard' => '控制面板',
            'logs' => '日志',
        ],

        'sidebar' => [
            'dashboard' => '控制面板',
            'general' => '基础设置',
            'cms' => '文章管理'
        ],
    ],

    'language-picker' => [
        'language' => '语言',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'zh-cn' => '中文',
            'en' => '英语'
        ],
    ],
];
