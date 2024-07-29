<?php
declare(strict_types=1);

namespace Exewen\RobotChat\Contract;


use Exewen\RobotChat\Constants\RobotEnum;

interface RobotChatInterface
{
    public function text(string $content, string $robot = RobotEnum::QY_WEIXIN);

    public function markdown(string $content, string $title = null, string $robot = RobotEnum::QY_WEIXIN);

}