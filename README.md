# 钉钉机器人消息发送




# 介绍
企业内部有较多系统支撑着公司的核心业务流程，譬如CRM系统、交易系统、监控报警系统等等。通过钉钉的自定义机器人，可以将这些系统事件同步到钉钉的聊天群。
laravel-dingbot 是一款钉钉机器人消息推送的Laravel扩展，您可以通过此扩展简单高效的推送消息通知到钉钉，进行监控和提醒操作。

### [钉钉官方文档](https://open.dingtalk.com/document/robots/custom-robot-access)

# 安装

```php
composer require dreamcoders/laravel-dingbot
```

# 在laravel项目中使用

安装成功后执行
```php
php artisan vendor:publish --provider="DreamCoders\DingBot\DingBotServiceProvider"
```
会自动将`dingbot.php`添加到您项目的config配置文件当中

# 相关配置

```php
return [
    'webhookUrl' => env('DING_ROBOT_URL', 'https://oapi.dingtalk.com/robot/send'),
    'access_token'   => [
        'default' => env('DING_TOKEN', '4c8ed2083bcd5ce3eb8eeXXXd38343211900ea29ef7bbef9156ad0892'),// 默认
        'bot1' => env('DING_TOKEN1', '你的钉钉群组机器人token'),//扩展更多token
        'bot2' => env('DING_TOKEN2', '你的钉钉群组机器人token'),//扩展更多token
    ],
];

```


### 钉钉推送access_token
- 钉钉推送链接Webhook:https://oapi.dingtalk.com/robot/send?access_token=you-push-token
- 发送钉钉机器人的token，即在您创建机器人Webhook之后的access_token

.env配置
```php
DING_TOKEN=you-push-token
```


### 多机器人配置
如果想要添加多个机器人，则在`dingbot.php`当中添加机器人名字和对应的token配置即可

```php
 'access_token'   => [
        'default' => env('DING_TOKEN', '4c8ed2083bcd5ce3eb8eeXXXd38343211900ea29ef7bbef9156ad0892'),// 默认
        'bot1' => env('DING_TOKEN1', '你的钉钉群组机器人token'),//扩展更多token
        'bot2' => env('DING_TOKEN2', '你的钉钉群组机器人token'),//扩展更多token
    ]
```

.env配置
```php
DING_TOKEN1=you-push-token
DING_TOKEN2=you-push-token
```


# 使用示例

## 发送纯文字消息
```php
Ding()->text("服务器通知报警,请紧急处理")->send();
```
or
```php
(new DingBot())->text('服务器通知报警,请紧急处理')->send();
```

发送消息@指定人员
```php
Ding()->text("服务器通知报警,请紧急处理")
->setAtMobiles(['13218899188'])
->send();
```
发送消息@所有人
```php
Ding()->text("服务器通知报警,请紧急处理")
->setAtAll()
->send();
```


## 发送markdown类型的消息

```php
$title = '杭州天气';
$markdown = "#### 杭州天气  \n ".
            "> 9度，@1825718XXXX 西北风1级，空气良89，相对温度73%\n\n ".
            "> ![screenshot](http://i01.lw.aliimg.com/media/lALPBbCc1ZhJGIvNAkzNBLA_1200_588.png)\n".
            "> ###### 10点20分发布 [天气](http://www.thinkpage.cn/) ";
            
Ding()->markdown($title,$markdown)->send();
```
发送消息@指定人员/所有人 同上


## 发送链接类型的消息

```php
 
$title = "自定义机器人协议";
$text = "群机器人是钉钉群的高级扩展功能。群机器人可以将第三方服务的信息聚合到群聊中，实现自动化的信息同步。例如：通过聚合GitHub，GitLab等源码管理服务，实现源码更新同步；通过聚合Trello，JIRA等项目协调服务，实现项目信息同步。不仅如此，群机器人支持Webhook协议的自定义接入，支持更多可能性，例如：你可将运维报警提醒通过自定义机器人聚合到钉钉群。";
$picUrl = "";
$messageUrl = "https://open-doc.dingtalk.com/docs/doc.htm?spm=a219a.7629140.0.0.Rqyvqo&treeId=257&articleId=105735&docType=1";

Ding()->link($title,$text,$messageUrl,$picUrl)->send();
```


## 发送ActionCard类型的消息

### 无跳转链接
```php
$title = "乔布斯 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身";
$text = "![screenshot](@lADOpwk3K80C0M0FoA) \n".
    " #### 乔布斯 20 年前想打造的苹果咖啡厅 \n\n".
    " Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划";

Ding()->actionCard($title,$text,1)->send();
```


### 整体跳转ActionCard类型(single)
```php
$title = "乔布斯 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身";
$text = "![screenshot](@lADOpwk3K80C0M0FoA) \n".
    " #### 乔布斯 20 年前想打造的苹果咖啡厅 \n\n".
    " Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划";

Ding()->actionCard($title,$text,1)
    ->single("阅读全文","https://www.dingtalk.com/")
    ->send();
```
### 独立跳转ActionCard类型(btns)

```php
$title = "乔布斯 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身";
$text = "![screenshot](@lADOpwk3K80C0M0FoA) \n".
    " #### 乔布斯 20 年前想打造的苹果咖啡厅 \n\n".
    " Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划";

Ding()->actionCard($title,$text,1)
    ->addButtons("内容不错","https://www.dingtalk.com/")
    ->addButtons("不感兴趣","https://www.dingtalk.com/")
    ->send();
```

## 发送FeedCard类型的消息

```php
       $linksArray = [
            [
                "title"=> "时代的火车向前开1通知",
                "messageURL"=> "https://www.dingtalk.com/",
                "picURL"=> "https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png"
            ],
            [
                "title"=> "时代的火车向前开2",
                "messageURL"=> "https://www.dingtalk.com/",
                "picURL"=> "https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png"
            ],
            [
                "title"=> "时代的火车向前开3",
                "messageURL"=> "https://www.dingtalk.com/",
                "picURL"=> "https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png"
            ],
            [
                "title"=> "时代的火车向前开4",
                "messageURL"=> "https://www.dingtalk.com/",
                "picURL"=> "https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png"
            ]
        ];
        (new DingBot())->feedCard($linksArray)->send();
        Ding()->feedCard($linksArray)->send();
```
## 多机器人消息发送

```php
Ding('bot1')->text("服务器通知报警,请紧急处理")->send();
```
or
```php
(new DingBot('bot1'))->text('服务器通知报警,请紧急处理')->send();
```
其他消息类型同上

enjoy :)


- 效果
![file](https://lccdn.phphub.org/uploads/images/201805/23/6932/q3nLCOPbRj.png?imageView2/2/w/1240/h/0)



