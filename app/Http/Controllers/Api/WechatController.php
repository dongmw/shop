<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class WechatController extends Controller
{
    public function serve()
    {
        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message){
            switch ($message->MsgType) {
                case 'event':
                    switch($message->EventKey) {
                        case 'recommend':
                            return $this->recommend();
                            break;
                        case 'joke':
                            return $this->joke();
                            break;

                        default:
                            return $this->default_msg();
                            break;
                    }
                    break;
                case 'text':
                    switch($message->Content) {
                        case '推荐':
                        case 'recommend':
                            return $this->recommend();
                            break;
                        case '笑话':
                        case 'joke':
                            return $this->joke();
                            break;

                        default:
                            return $this->default_msg();
                            break;
                    }

                    break;
                case 'voice':
                    return $message->Recognition;

                    break;
                default:
                    return '收到其它消息';
                    break;
            }

            return "欢迎关注 overtrue！";
        });

        return $wechat->server->serve();
    }

    function recommend(){
        $recommends = Product::where('recommend', true)->take(10)->get();
        $news = [];
        foreach($recommends as $r) {
            $news[] = new News([
                'title'       => $r->name,
                'description' => $r->desc,
                'url'         => 'http://www.amanrui.com/product/' . $r->id,
                'image'       => $r->thumb
            ]);
        }
        return $news;
    }

    function joke(){
        $weather = file_get_contents("http://www.weather.com.cn/data/sk/101200101.html");
        $weather = json_decode($weather, true);
        $weather = $weather['weatherinfo'];
        return '武汉今天的温度是:'. $weather['temp']. '风力:'.$weather['WS'];
    }

    function default_msg(){
        return '别开玩笑了！';
    }
}
