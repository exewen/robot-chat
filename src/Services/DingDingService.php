<?php
declare(strict_types=1);

namespace Exewen\RobotChat\Services;

use Exewen\RobotChat\Constants\RobotEnum;
use Exewen\RobotChat\Exception\RobotChatException;

class DingDingService extends BaseService
{
    private $webhookUrl = '/robot/send';

    public function text(string $content, string $robot = RobotEnum::DING_DING): string
    {
        $driver   = $this->getHttpClient($robot);
        $params   = [
            'msgtype' => 'text',
            'text'    => [
                "content" => $content
            ]
        ];
        $url      = $this->makeDingSignature($this->webhookUrl, $robot);
        $response = $this->httpClient->post($driver, $url, $params);
        $result = $response->getBody()->getContents();
        $data     = json_decode($result, true);
        if ($data['errcode'] != 0) {
            throw new RobotChatException($result);
        }
        return $result;
    }

    public function markdown(string $content, string $title = null, string $robot = RobotEnum::DING_DING): string
    {
        $driver   = $this->getHttpClient($robot);
        $params   = [
            'msgtype'  => 'markdown',
            'markdown' => [
                "title" => $title ?: "新消息",
                "text"  => $content
            ]
        ];
        $url      = $this->makeDingSignature($this->webhookUrl, $robot);
        $response = $this->httpClient->post($driver, $url, $params);
        $result = $response->getBody()->getContents();
        $data     = json_decode($result, true);
        if ($data['errcode'] != 0) {
            throw new RobotChatException($result);
        }
        return $result;
    }


}