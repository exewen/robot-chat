<?php
declare(strict_types=1);

namespace ExewenTest\RobotChat;

use Exewen\RobotChat\Constants\RobotEnum;
use Exewen\RobotChat\RobotChatFacade;

class RobotChatTest extends Base
{

    /**
     * qyweixin text
     * @return void
     */
    public function testQyWeixin()
    {
        $response = RobotChatFacade::text('消息通知测试');
        $this->assertNotEmpty($response);
    }

    /**
     * ding text
     * @return void
     */
    public function testDing()
    {
        $response = RobotChatFacade::text('消息通知测试', RobotEnum::DING_DING);
        $this->assertNotEmpty($response);
    }

    /**
     * ding text markdown
     * @return void
     */
    public function testMarkdownDing()
    {
        $markdown        = '实时新增用户反馈<font color="warning">132例</font>，请相关同事注意。
> 类型:<font color="comment">用户反馈</font>
> 普通用户反馈:<font color="comment">117例</font>
> VIP用户反馈:<font color="comment">15例</font>';
        $response = RobotChatFacade::markdown($markdown, null, RobotEnum::DING_DING);
        $this->assertNotEmpty($response);
    }

}