<?php

declare(strict_types=1);

use Exewen\Http\Middleware\LogMiddleware;
use Exewen\RobotChat\Constants\RobotEnum;

return [
    'channels' => [
        RobotEnum::QY_WEIXIN => [
            'verify'          => false,
            'ssl'             => true,
            'host'            => 'qyapi.weixin.qq.com',
            'port'            => null,
            'prefix'          => null,
            'connect_timeout' => 3,
            'timeout'         => 20,
            'handler'         => [
                LogMiddleware::class,
            ],
            'extra'           => [
                'x-api-key' => null,
            ],
            'proxy'           => [
                'switch' => false,
                'http'   => '127.0.0.1:8888',
                'https'  => '127.0.0.1:8888'
            ]
        ],

        RobotEnum::DING_DING => [
            'verify'          => false,
            'ssl'             => true,
            'host'            => 'oapi.dingtalk.com',
            'port'            => null,
            'prefix'          => null,
            'connect_timeout' => 3,
            'timeout'         => 20,
            'handler'         => [
                LogMiddleware::class,
            ],
            'extra'           => [
                'x-api-key' => null,
            ],
            'proxy'           => [
                'switch' => false,
                'http'   => '127.0.0.1:8888',
                'https'  => '127.0.0.1:8888'
            ]
        ],
    ]
];