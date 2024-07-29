<?php

declare(strict_types=1);

use Exewen\RobotChat\Constants\RobotEnum;
use Exewen\RobotChat\Services\DingDingService;
use Exewen\RobotChat\Services\QyWeixinService;

return [
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
];