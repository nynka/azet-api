<?php

/*
 * Copy this file to ZF3 projects config/autoload directory.
 */

namespace Azet;

return [
    'doctrine' => [
        'connection' => [
            'orm_azet' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => [
                    'host'     => '10.0.75.2',
                    'port'     => '3306',
                    'user'     => 'USER',
                    'password' => 'PASSWORD',
                    'dbname'   => 'azet',
                    'charset'  => 'utf8mb4',
                ]
            ]
        ],
        'entitymanager' => [
            'orm_azet' => [
                'connection'    => 'orm_azet',
                'configuration' => 'orm_azet',
            ],
        ],
        'configuration' => [
            'orm_azet' => [
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
                'hydration_cache' => 'array',
                // Generate proxies automatically (turn off for production)
                'generate_proxies'  => true,

                // directory where proxies will be stored. By default, this is in
                // the `data` directory of your application
                'proxy_dir'         => 'data/Azet/Proxy',

                // namespace for generated proxy classes
                'proxy_namespace'   => 'Azet\Proxy',
            ],
        ],
        'driver' => [
            // overriding zfc-user-doctrine-orm's config
            'azet_entity' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => __DIR__ . '/../../vendor/nynka/azet/src/Entity',
            ],

            'orm_default' => [
                'drivers' => [
                    'Azet' => 'azet_entity',
                ],
            ],
        ],
    ],
];