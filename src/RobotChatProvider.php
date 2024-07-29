<?php
declare(strict_types=1);

namespace Exewen\RobotChat;

use Exewen\Di\ServiceProvider;
use Exewen\RobotChat\Contract\RobotChatInterface;

class RobotChatProvider extends ServiceProvider
{

    /**
     * 服务注册
     * @return void
     */
    public function register()
    {
        $this->container->singleton(RobotChatInterface::class);
    }

}