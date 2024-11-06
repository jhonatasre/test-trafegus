<?php
return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' =>'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => [
                    'user' => 'root',
                    'password' => 'root',
                    'dbname' => 'docker',
                    'host' => 'database',
                    'port' => 3306,
                ],
            ],
        ],
    ],
];