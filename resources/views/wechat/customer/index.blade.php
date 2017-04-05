@extends('wechat.layout.application')

@section('content')
    <div class="page-personal-center" data-log="个人中心">

        <div class="b1">
            <div class="new_info">
                <div>
                    <div class="name"></div>
                    <div class="img"><img src="{{session('wechat.customer.headimgurl')}}"></div>
                </div>
            </div>
            <div class="new_nav">
                <ul>
                    <li>
                        <a href="/order">
                            <div class="spr spr1"></div>
                            <p>全部订单</p>
                            <div class="line n"></div>
                        </a>
                    </li>
                    <li>
                        <a href="/order?status=1">
                            <div class="spr spr2"></div>
                            <p>待付款</p>
                            <div class="line n"></div>
                        </a>
                    </li>
                    <li>
                        <a href="/order?status=2">
                            <div class="spr spr3"></div>
                            <p>待收货</p>
                            <div class="line n"></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <ol class="list">
            {{--<li><strong class="sprl ise"></strong><span>意见反馈</span></li>--}}
            <li onclick="location.href='/address/manage'">
                <strong class="sprl is"></strong><span>地址管理</span>
            </li>
        </ol>
        @include('layouts.wechat._footer')
    </div>
@endsection