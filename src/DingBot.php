<?php

namespace DreamCoders\DingBot;
use DreamCoders\DingBot\Messages\Text;
use DreamCoders\DingBot\Messages\Markdown;
use DreamCoders\DingBot\Messages\ActionCard;
use DreamCoders\DingBot\Messages\FeedCard;
use DreamCoders\DingBot\Messages\Link;
use GuzzleHttp\Client;

class DingBot
{
    private $config;
    protected $access_token;
    protected $webhookUrl;
    protected $message;

    protected $mobiles = [];
    protected $atAll = false;

    public function __construct($robot = 'default')
    {
        if (!$this->config = config('dingbot')) {
            throw new \Exception('dingbot配置文件缺失或缺少');
        }

        if ($robot != 'default') {
            $this->access_token = $this->config['access_token'][$robot] ?? '';
        } else {
            $this->access_token = $this->config['access_token']['default'];
        }

        $this->webhookUrl = $this->config['webhookUrl'] . '?access_token=' . $this->access_token;

        return $this;
    }



    /**
     * 设置@的用户的手机号
     * @param array $mobiles
     * @return $this
     */

    public function setAtMobiles(array $mobiles)
    {
        if ($this->message) {
            $this->message->at_mobiles = $mobiles;
        }
        return $this;
    }


    /**
     * 设置at all
     * @return $this
     */
    public function setAtAll()
    {
        if ($this->message) {
            $this->message->is_at_all = true;
        }
        return $this;
    }


    /**
     * @param $content
     * @return $this
     */
    public function text($content)
    {
        $this->message = new Text($content);
        return $this;
    }

    /**
     * @param $title
     * @param $text
     * @param $messageUrl
     * @param string $picUrl
     * @return $this
     */
    public function link($title, $text, $messageUrl, $picUrl = '')
    {
        $this->message = new Link($title, $text, $messageUrl, $picUrl);
        return $this;
    }

    /**
     * @param $title
     * @param $text
     * @return $this
     */
    public function markdown($title, $markdown)
    {
        $this->message = new Markdown($title, $markdown);
        return $this;
    }


    /**
     * @param $title
     * @param $text
     * @param int $btnOrientation
     * @return $this
     */
    public function actionCard($title, $markdown, $btnOrientation = 0)
    {
        $this->message = new ActionCard($title, $markdown, $btnOrientation);
        return $this;
    }

    public function single($title,$url){
        $this->message->message['actionCard']['singleTitle'] = $title;
        $this->message->message['actionCard']['singleURL'] = $url;
        return $this;
    }

    public function addButtons($title,$url){
        $this->message->message['actionCard']['btns'][] = [
            'title' => $title,
            'actionURL' => $url
        ];
        return $this;
    }



    /**
     * @param $linksArray
     * @return $this
     */
    public function feedCard($linksArray)
    {
        $this->message = new FeedCard($linksArray);
        return $this;
    }



    public function send()
    {
        if (!$this->message) {
            throw new \Exception('发送失败：没有设置有效的消息类型和内容');
        }
        $client = new Client();

        $response = $client->post($this->webhookUrl, [
            'json' => $this->message->getMessageBody(),
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        if ($result['errcode'] != 0) {
            throw new \Exception('钉钉发送失败：' . $result['errmsg']);
        }

        return true;
    }




}
