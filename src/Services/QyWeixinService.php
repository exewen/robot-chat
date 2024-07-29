<?php
declare(strict_types=1);

namespace Exewen\RobotChat\Services;

use Exewen\RobotChat\Constants\RobotEnum;
use Exewen\RobotChat\Exception\RobotChatException;

class QyWeixinService extends BaseService
{
    private $webhookUrl = '/cgi-bin/webhook/send';

    public function text(string $content, string $robot = RobotEnum::QY_WEIXIN): string
    {
        $driver   = $this->getHttpClient($robot);
        $token    = $this->getToken($robot);
        $params   = [
            'msgtype' => 'text',
            'text'    => [
                "content" => $content
            ]
        ];
        $url      = $this->webhookUrl . '?key=' . $token;
        $response = $this->httpClient->post($driver, $url, $params);
        $data     = json_decode($response, true);
        if ($data['errcode'] != 0) {
            throw new RobotChatException($response);
        }
        return $response;
    }

    public function markdown(string $content, string $title = null, string $robot = RobotEnum::QY_WEIXIN): string
    {
        $driver   = $this->getHttpClient($robot);
        $token    = $this->getToken($robot);
        $params   = [
            'msgtype'  => 'markdown',
            'markdown' => [
                "content"  => $content
            ]
        ];
        $url      = $this->webhookUrl . '?key=' . $token;
        $response = $this->httpClient->post($driver, $url, $params);
        $data     = json_decode($response, true);
        if ($data['errcode'] != 0) {
            throw new RobotChatException($response);
        }
        return $response;
    }
}