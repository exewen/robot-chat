<?php
declare(strict_types=1);

namespace Exewen\RobotChat\Services;

use Exewen\Config\Contract\ConfigInterface;
use Exewen\Http\Contract\HttpClientInterface;
use Exewen\RobotChat\Contract\RobotChatInterface;
use Exewen\RobotChat\Exception\RobotChatException;

abstract class BaseService implements RobotChatInterface
{

    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @var ConfigInterface
     */
    protected $config;

    public function __construct(HttpClientInterface $httpClient, ConfigInterface $config)
    {
        $this->httpClient = $httpClient;
        $this->config     = $config;
    }

    protected function getHttpClient(string $robot)
    {
        $robotList = $this->config->get('robot-chat');
        $temp      = $robotList[$robot]['channel_api'] ?? null;
        if (empty($temp)) {
            throw  new RobotChatException('robot-chat channel_api not found');
        }
        return $temp;
    }

    protected function getToken(string $robot)
    {
        $robotList = $this->config->get('robot-chat');
        $temp      = $robotList[$robot]['token'] ?? null;
        if (empty($temp)) {
            throw  new RobotChatException('robot-chat token not found');
        }
        return $temp;
    }

    protected function getSecret(string $robot)
    {
        $robotList = $this->config->get('robot-chat');
        $temp      = $robotList[$robot]['secret'] ?? null;
        if (empty($temp)) {
            throw  new RobotChatException('robot-chat secret not found');
        }
        return $temp;
    }

    /**
     * 请求URL签名
     * @param string $url
     * @param string $robot
     * @return string
     */
    protected function makeDingSignature(string $url, string $robot): string
    {
        $token  = $this->getToken($robot);
        $secret = $this->getSecret($robot);
        $t      = intval(microtime(true) * 1000);
        $sign   = urlencode(
            base64_encode(
                hash_hmac('sha256', $t . "\n" . $secret, $secret, true)
            )
        );
        return "{$url}?access_token={$token}&timestamp={$t}&sign={$sign}";
    }
}