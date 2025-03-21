<?php

declare(strict_types=1);

namespace Exewen\RobotChat;

use Exewen\Di\Container;
use Exewen\Di\Context\ApplicationContext;
use Exewen\Facades\AppFacade;
use Exewen\RobotChat\Constants\RobotEnum;
use Exewen\RobotChat\Contract\RobotChatInterface;
use Exewen\RobotChat\Exception\RobotChatException;
use Exewen\Config\Contract\ConfigInterface;

class RobotChat
{
    private $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * 发送文本消息
     * @param string $content
     * @param string $robot
     * @return mixed
     */
    public function text(string $content, string $robot = RobotEnum::QY_WEIXIN)
    {
        return $this->driver($robot)->text($content, $robot);
    }

    /**
     * 发送 markdown
     * @param string $content
     * @param string $robot
     * @return mixed
     */
    public function markdown(string $content, string $title = null, string $robot = RobotEnum::QY_WEIXIN)
    {
        return $this->driver($robot)->markdown($content, $title, $robot);
    }

    /**
     * 获取工厂方法
     * @param string $robot
     * @return RobotChatInterface
     */
    private function driver(string $robot): RobotChatInterface
    {
        $robotChatConfig = $this->config->get('robot-chat');
        $class           = $robotChatConfig[$robot]['driver'] ?? null;
        if (empty($class)) {
            throw new RobotChatException('robot-chat driver must be specified.');
        }
        $container = AppFacade::getContainer();
        $container->singleton($class);
        return $container->get($class);
    }

}
