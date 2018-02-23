<?php 

// Default configuration file

return [
    'db' => [
        'admin' => [
            'database' => 'sma_admin',
            'hostname' => 'mysql',
            'username' => 'root',
            'password' => 'password'
        ],
        'common' => [
            'database' => 'sma_common',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => 'password'
        ]
    ],
    'redis' => [
        'host' => 'redis'
    ]
];

