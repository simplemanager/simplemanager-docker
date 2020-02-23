<?php 

// Default configuration file

return [
    'db' => [
        'admin' => [
            'database' => 'sma_admin',
            'hostname' => 'mysql',
            'username' => 'root',
            'password' => ''
        ],
        'common' => [
            'database' => 'sma_common',
            'hostname' => 'mysql',
            'username' => 'root',
            'password' => ''
        ]
    ],
    'redis' => [
        'host' => 'redis'
    ]
];
