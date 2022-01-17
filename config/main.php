<?php

$config = [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['queue'],
    // DI 容器
    'container' => [
        'definitions' => [
        ],
        // 单例
        'singletons' => [
        ]
    ],
    'components' => [
        'db' => [
            'class' => yii\db\Connection::class,
            'dsn' => env("DB.DSN"),
            'username' => env("DB.USERNAME"),
            'password' => env("DB.PASSWORD"),
            'charset' => 'utf8',
        ],
        'redis' => [
            'class' => yii\redis\Connection::class,
            'hostname' => env("REDIS.HOSTNAME"),
            'password' => env("REDIS.PASSWORD"),
            'port' => env("REDIS.PORT"),
            'database' => env("REDIS.DATABASE"),
        ],
        'queue' => [
            'class' => yii\queue\redis\Queue::class,
            'redis' => 'redis',
            'channel' => 'queue',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];


if (!YII_ENV_PROD && YII_DEBUG) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.10.*', '0.0.0.0', '*'],
        'generators' => [
            'job' => [
                'class' => \yii\queue\gii\Generator::class,
            ],
            'model' => [
                'class' => 'yii\gii\generators\model\Generator',
                'db' => 'db',
                'generateRelations' => 'none',
                'generateRelationsFromCurrentSchema' => false
            ],
        ],
    ];
}

return $config;
