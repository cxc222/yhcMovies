<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'permissions' => [
            'created' => '成功创建权限。',
            'deleted' => '成功删除权限。',

            'groups'  => [
                'created' => '成功创建权限组。',
                'deleted' => '成功删除权限组。',
                'updated' => '成功更新权限组。',
            ],

            'updated' => '成功更新权限。',
        ],

        'roles' => [
            'created' => '成功创建角色。',
            'deleted' => '成功删除角色。',
            'updated' => '成功更新角色。',
        ],

        'users' => [
            'confirmation_email' => 'A new confirmation e-mail has been sent to the address on file.',
            'created' => '成功创建用户。',
            'deleted' => '成功删除用户。',
            'deleted_permanently' => '永久删除用户。',
            'restored' => '成功恢复用户信息。',
            'updated' => '成功更新用户。',
            'updated_password' => "成功更新用户密码。",
        ],
        'articles' => [
            'created' => '文章发布成功',
            'deleted' => '删除文章成功',
            'edited' => '文章更新成功'
        ]
    ],
];