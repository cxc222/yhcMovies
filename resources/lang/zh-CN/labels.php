<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all' => '全部',
        'yes' => '是',
        'no' => '否',
        'custom' => '自定义',
        'actions' => '操作',
        'buttons' => [
            'save' => '保存',
            'update' => '更新',
        ],
        'hide' => '隐藏',
        'none' => '无',
        'show' => '显示',
        'toggle_navigation' => '切换',
    ],

    'backend' => [
        'access' => [
            'permissions' => [
                'create' => '创建权限',
                'dependencies' => 'Dependencies',
                'edit' => '编辑权限',

                'groups' => [
                    'create' => '创建分组',
                    'edit' => '编辑分组',

                    'table' => [
                        'name' => '名称',
                    ],
                ],

                'grouped_permissions' => '分组权限',
                'label' => '权限',
                'management' => '权限管理',
                'no_groups' => 'There are no permission groups.',
                'no_permissions' => 'No permission to choose from.',
                'no_roles' => '没有设置角色',
                'no_ungrouped' => 'There are no ungrouped permissions.',

                'table' => [
                    'dependencies' => 'Dependencies',
                    'group' => '分组',
                    'group-sort' => '分组排序',
                    'name' => '名称',
                    'permission' => '权限',
                    'roles' => '角色',
                    'system' => '系统',
                    'total' => 'permission total|permissions total',
                    'users' => '用户',
                ],

                'tabs' => [
                    'general' => '基本',
                    'groups' => '所有分组',
                    'dependencies' => 'Dependencies',
                    'permissions' => '所有权限',
                ],

                'ungrouped_permissions' => 'Ungrouped Permissions',
            ],

            'roles' => [
                'create' => '创建角色',
                'edit' => '编辑角色',
                'management' => '角色管理',

                'table' => [
                    'number_of_users' => '用户数',
                    'permissions' => '权限',
                    'role' => '角色',
                    'sort' => '排序',
                    'total' => 'role total|roles total',
                ],
            ],

            'users' => [
                'active' => '活动用户',
                'all_permissions' => '所有权限',
                'change_password' => '修改密码',
                'change_password_for' => '重新输入密码 :user',
                'create' => '创建用户',
                'deactivated' => '停用用户',
                'deleted' => '删除用户',
                'dependencies' => 'Dependencies',
                'edit' => '编辑用户',
                'management' => '用户管理',
                'no_other_permissions' => '没有其他权限',
                'no_permissions' => '没有权限',
                'no_roles' => '没有设置角色',
                'permissions' => '权限',
                'permission_check' => 'Checking a permission will also check its dependencies, if any.',

                'table' => [
                    'confirmed' => '确认',
                    'created' => '创建',
                    'email' => '邮箱',
                    'id' => 'ID',
                    'last_updated' => '最后更新',
                    'name' => '名称',
                    'no_deactivated' => '没有停用用户',
                    'no_deleted' => '没有删除用户',
                    'other_permissions' => '其他权限',
                    'roles' => '角色',
                    'total' => '用户数|用户总数',
                ],
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => '登录',
            'login_button' => '登录',
            'login_with' => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Remember Me',
        ],

        'passwords' => [
            'forgot_password' => 'Forgot Your Password?',
            'reset_password_box_title' => 'Reset Password',
            'reset_password_button' => 'Reset Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'Country Alpha Codes',
                'alpha2' => 'Country Alpha 2 Codes',
                'alpha3' => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico State List',
                'us' => [
                    'us' => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed' => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Created At',
                'edit_information' => 'Edit Information',
                'email' => 'E-mail',
                'last_updated' => 'Last Updated',
                'name' => 'Name',
                'update_information' => 'Update Information',
            ],
        ],

    ],
];
