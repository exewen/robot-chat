<?php
declare(strict_types=1);

namespace Exewen\RobotChat;

use Exewen\Facades\Facade;
use Exewen\Http\HttpProvider;
use Exewen\Logger\LoggerProvider;
use Exewen\RobotChat\Constants\RobotEnum;
use Exewen\RobotChat\Contract\RobotChatInterface;

/**
 * @method static string text(string $content, string $robot = RobotEnum::QY_WEIXIN)
 * @method static string markdown(string $content, string $title = null, string $robot = RobotEnum::QY_WEIXIN)
 */
class RobotChatFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return RobotChatInterface::class;
    }

    public static function getProviders(): array
    {
        return [
            LoggerProvider::class,
            HttpProvider::class,
            RobotChatProvider::class
        ];
    }
}