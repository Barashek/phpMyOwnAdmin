<?php

use src\Modules\Query\Domain\Repository\QueryRepositoryInterface;
use src\Modules\Query\Infrastructure\Repository\QueryRepository;
use src\Modules\SysDB\Domain\Repository\SysDbRepositoryInterface;
use src\Modules\SysDB\Infrastructure\Repository\DbColumnNameRepository;
use src\Modules\SysDB\Infrastructure\Repository\DbTableNameRepository;

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
    ],
    'container' => [
        'singletons' => [
            QueryRepositoryInterface::class => QueryRepository::class,
            SysDbRepositoryInterface::class => DbTableNameRepository::class,
//            SysDbRepositoryInterface::class => DbColumnNameRepository::class,
        ]
    ]
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
