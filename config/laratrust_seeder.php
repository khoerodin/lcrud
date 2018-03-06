<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'article' => 'c,r,u,d',
            'tag' => 'c,r,u,d',
            'role' => 'c,r,u,d',
            'permission' => 'c,r,u,d',
            'user' => 'r',
        ],
        'administrator' => [
            'article' => 'c,r,u,d',
            'tag' => 'r,u',
            'role' => 'r,u',
            'permission' => 'r,u',
            'user' => 'r',
        ],
        'user' => [
            'article' => 'r,u',
            'tag' => 'r,u',
            'user' => 'r',
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'article' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
