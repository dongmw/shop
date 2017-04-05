@extends('wechat.layout.application')

@section('content')
    <div class="page-order-checkout">
        <div class="page-order-checkout-wrap">
            <div class="b1 icon_arrow">
                <a href="/address/index">
                    <div class="b11"><p><span>{{$address->name}}</span><span>{{$address->tel}}</span></p></div>
                    <div class="b13"><p id="address" data-id="{{$address->id}}">{{$address->province}} {{$address->city}} {{$address->area}} {{$address->detail}}</p></div>
                </a>
            </div>
            <div class="ui_line"></div>
            <div class="b2">
                <ul>
                    <li class="on"><a href="javascript:;" class="alipaywap">微信支付</a></li>
                    <li class=""><a href="javascript:;" class="">货到付款</a></li>
                </ul>
            </div>
            <div class="ui_line"></div>

            <!--
            <div class="b3 icon_arrow">
                <dl>
                    <dt><span>电子发票</span><strong>发票类型</strong></dt>
                </dl>
            </div>
            <div class="b3 icon_arrow">
                <dl>
                    <dt><span>不限送货时间</span><strong>送货时间</strong></dt>
                </dl>
            </div>
            <div class="ui_line"></div>
            -->

            <div class="b8">
                @foreach($carts as $cart)
                <div class="b8w">
                    <div class="b81">
                        <div class="img"><img src="{{$cart->product->thumb}}?width=80&amp;height=80">
                        </div>
                    </div>
                    <div class="b82">
                        <div class="name"><p>
                                <span>{{$cart->product->name}} {{$cart->product->desc}}</span></p></div>
                    </div>
                    <div class="b83">
                        <div class="price"><strong>{{$cart->product->price}}元</strong></div>
                    </div>
                </div>
                @endforeach

            <div class="ui_line"></div>
            <div class="b5">
                <div class="b51"><p><strong>商品价格：</strong><span>{{$count['total_price']}}元</span></p></div>
                <div class="b53"><p><strong>配送费用：</strong><span>0元</span></p></div>
            </div>
            <div class="b7">
                <div class="b71"><span>共{{$count['num']}}件 合计: </span><strong>{{$count['total_price']}}元</strong></div>
                <div class="b72"><a href="javascript:;" class="ui-button" id="pay"><span>去付款</span></a></div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $("#pay").click(function () {
                var address_id = $("#address").data('id');
                if (address_id == '') {
                    alert('请先填写一个送货地址~');
                    return false;
                }

                $.ajax({
                    type: 'POST',
                    url: '/order',
                    data: {address_id: address_id},
                    success: function (data) {
//                        console.log(data);
                        if (data.status == '0') {
                            alert(data.info);
                            location.href = '/cart';
                            return false;
                        }

                        //微信支付
                        location.href = '/order/pay/' + data.order_id;
                    }
                })
            })

        })
    </script>
@endsection

