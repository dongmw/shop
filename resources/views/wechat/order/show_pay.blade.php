@extends('wechat.layout.application')

@section('content')
    <div class="page-order-pay" data-log="在线支付">
        <div class="box box1">
            <div class="p1"><span class="icon-checked"></span><span>订单提交成功</span></div>
            <!--<div class="p2"><span>请在1小时57分43秒内完成支付，超时订单将关闭。</span></div>-->
        </div>
        <div class="box box2">
            <div class="p">订单金额：1348元 &nbsp;&nbsp; 订单编号：5160420645600019</div>
            <div class="p h_box">
                <div>收货信息：</div>
                <div class="flex_1">刘东 15007160010<br>湖北武汉市洪山区大学园路4号麒麟社5栋1002 (430070)</div>
            </div>
            <div class="p">发票类型：个人电子发票 <p>发票抬头：个人</p></div>
        </div>
        <div class="box box3">
            <div class="head"><span>请选择支付方式</span></div>
            <div class="list">
                <div class="item active">
                    <div data-log="A0-支付宝" class="inner">
                        <div class="p">支付宝</div>
                        <div class="p right">大额支付推荐使用支付宝快捷支付</div>
                    </div>
                </div>
                <div class="item">
                    <div data-log="A1-小米钱包" class="inner">
                        <div class="p">小米钱包</div>
                        <div class="p right"></div>
                    </div>
                </div>
                <div class="item">
                    <div data-log="A2-银联在线支付" class="inner">
                        <div class="p">银联在线支付</div>
                        <div class="p right"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box4">
            <div class="p p1">
                <p>本次需支付：<span class="hot">1348元</span></p>
            </div>
        </div>
        <div class="box box5"><a href="javascript:;" data-log="bottom-bankgo" class="ui-button"><span>立即支付</span></a>
        </div>
    </div>
@endsection


