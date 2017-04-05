<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lottery;
use App\Models\Raffle;
use App\Models\Customer;

class LotteryController extends Controller
{


    function index()
    {
        $raffle = Raffle::where('id',1)->first();
        return view('wechat.lottery.index')->with('raffle',$raffle);
    }

    function do_lottery(Request $request){
        $prize = $request->date[0];
        $original = session('wechat.oauth_user.original');
        unset($original['privilege']);
        $openid = $original['openid'];
        $customer = Customer::where('openid', $openid)->first();

        $data = [];
        $data['openid'] = $customer->openid;
        $data['nickname'] = $customer->nickname;
        $data['prize'] = $prize;

        $result['num'] = Lottery::where('openid',$data['openid'])->count();

        $date = Raffle::where('id',1)->first();
        $time = explode("~",$date->time);
        foreach ($time as $k=>$v) {
              $time['$k'] = $k ==0 ? $v."00:00:00":$v."23:59:59";
        }
        //判断抽奖的时间
        if (strtotime($time[0]) > time() || time() > strtotime($time[1])){
              return ['status'=>0,'info'=>'抽奖活动还未开始，敬请期待'];
        }
        //判断抽奖次数
        if ($result['num']>=3){
            return ['status'=>1,'msg'=>'您的抽奖次数已经用完'];
        }
        //记录抽奖信息到数据库
        Lottery::Create($data);



        //先判断当前抽奖是否超时

        //当日抽奖次数是否超过3次，时间

        //去helpers加入权重算法函数countWeight
        //return $request->all();


         //$result = countWeight($data);
        //

        //记录抽奖信息到数据库
    }
}
