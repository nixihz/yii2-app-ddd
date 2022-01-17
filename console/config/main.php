<?php

$params = array_merge(
    require __DIR__ . '/../../config/params.php',
    require __DIR__ . '/params.php',
);

$config = [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'runtimePath' => dirname(dirname(__DIR__)) . '/runtime/console',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];

return $config;