<?php

declare(strict_types=1);

namespace Exewen\RobotChat;

use Exewen\RobotChat\Constants\RobotEnum;
use Exewen\RobotChat\Contract\RobotChatInterface;
use Exewen\RobotChat\Services\DingDingService;
use Exewen\RobotChat\Services\QyWeixinService;

class ConfigRegister
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                RobotChatInterface::class => RobotChat::class,
            ],

            'robot-chat' => [
                RobotEnum::QY_WEIXIN => [
                    'channel_api' => RobotEnum::QY_WEIXIN,
                    'driver'      => QyWeixinService::class,
                    'token'       => 'xxx',
                ],
                RobotEnum::DING_DING => [
                    'channel_api' => RobotEnum::DING_DING,
                    'driver'      => DingDingService::class,
                    'token'       => 'xxx',
                    'secret'      => 'xxx',
                ]
            ],

            'http' => [
                'channels' => [
                    RobotEnum::QY_WEIXIN => [
                        'verify'          => false,
                        'ssl'             => true,
                        'host'            => 'qyapi.weixin.qq.com',
                        'port'            => null,
                        'prefix'          => null,
                        'connect_timeout' => 3,
                        'timeout'         => 20,
                        'handler'         => [],
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
                        'handler'         => [],
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
            ]

        ];
    }
}
