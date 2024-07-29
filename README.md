## 配置+初始化

```php
# copy配置文件并配置
cp -rf ./publish/exewen .you_app/config/exewen
# boot启动定义(composer 加载路径)
!defined('BASE_PATH_PKG') && define('BASE_PATH_PKG', dirname(__DIR__, 1));
```
## 使用
```php
use Exewen\RobotChat\RobotChatFacade;

# text
RobotChatFacade::text('消息通知测试');
# markdown
$markdown        = '实时新增用户反馈<font color="warning">132例</font>，请相关同事注意。
> 类型:<font color="comment">用户反馈</font>
> 普通用户反馈:<font color="comment">117例</font>
> VIP用户反馈:<font color="comment">15例</font>';
RobotChatFacade::markdown($markdown, null, RobotEnum::DING_DING);
```