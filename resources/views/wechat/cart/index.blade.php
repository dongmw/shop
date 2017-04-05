@extends('wechat.layout.application')

@section('content')
    <div class="cart-index" id="more" @if (!$carts->isEmpty()) style="display: none;" @endif>
        <div style="height:1rem;"></div>

        <div class="cart-index-wrap">
            <div class="empt">
                <div class="b3">
                    <a href="/product/category" class="ui-button ui-button-disable">
                        <span>全部商品</span>
                    </a>
                    <a href="/" class="ui-button">
                        <span>精选商品</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="cart-index" id="carts" @if ($carts->isEmpty()) style="display: none;" @endif>
        <div class="cart-index-wrap">
            <div class="cart-list">
                <ul>
                    @foreach ($carts as $cart)
                        <li class="item">
                            <div class="ui-box">
                                <div class="imgProduct">
                                    <a href="/product/{{$cart->product->id}}">
                                        <img src="{{$cart->product->thumb}}">
                                    </a>
                                </div>
                                <div class="info ui-box-flex">
                                    <div class="name">
                                        <span>{{$cart->product->name}}</span>
                                    </div>
                                    <div class="price">
                                        <p>
                                            <span>售价：</span><span>{{doubleval($cart->product->price)}}元</span>
                                            <span>合计：</span><span class="hj">{{doubleval($cart->product->price) * $cart->num}}
                                                元</span>
                                        </p>
                                        {{--<div class="tip">--}}
                                        {{--<span style="display: none;">请于2016/04/11 00:58前下单，逾期将失效。</span>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="num" data-id="{{$cart->id}}" data-price="{{$cart->product->price}}">
                                        <div class="xm-input-number">
                                            <div class="input-sub @if($cart->num > 1) active @endif"></div>
                                            <div class="input-num"><span>{{$cart->num}}</span></div>
                                            <div class="input-add active"></div>
                                        </div>
                                        <div class="delete">
                                            <a href="javascript:;">
                                                <span class="icon-iconfontshanchu"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="append"></div>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="pointBox">
                <div class="point" style="display: none;"><span class="act act_special">包邮</span><span></span></div>
                <div class="point">
                    <p>温馨提示：产品是否购买成功，以最终下单为准，请尽快结算</p>
                </div>
            </div>

            <!-- Navbar -->
            <div class="bottom-submit ui-box">
                <div class="price">
                    <span id="num">共{{$count['num']}}件 金额：</span><br>
                    <strong id="total_price">{{doubleval($count['total_price'])}}</strong><span>元</span>
                </div>
                <div class="btn">
                    <a class="ui-button ui-button-disable" href="/product/category"><span>继续购物</span></a>
                </div>
                <div class="btn">
                    <a class="ui-button" href="/order/checkout"><span>去结算</span></a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(function () {
            //删除


            $(".delete").click(function () {
                var _this = $(this);

                $.ajax({
                    type: 'DELETE',
                    url: '/cart',
                    data: {id: _this.parents(".num").data('id')},
                    success: function (data) {
                        var length = $(".item").length;
                        if (length == 1) {
                            $('#carts').hide();
                            $('#more').show();
                            return false;
                        }
                        $("#num").text("共" + data.num + "件 金额:");
                        $("#total_price").text(data.total_price);

                        _this.parents('.item').remove();

                    }
                })
            })

            //增加数量
            $(".input-add").click(function () {
                var _this = $(this);

                var $num = _this.siblings('.input-num').children('span');
                var $sub = _this.siblings('.input-sub');
                var price = _this.parents(".num").data('price');

                var num = $num.text();
                num = parseInt(num) + 1;
                $num.text(num);

                var hj = num * price;
//                console.log(price);
                _this.parents('.info').find('.hj').text(hj + '元');

                if (!$sub.hasClass('active')) {
                    $sub.addClass('active');
                }

                $.ajax({
                    type: 'PATCH',
                    url: '/cart',
                    data: {
                        id: _this.parents(".num").data('id'),
                        type: 'add'
                    },
                    success: function (data) {
                        $("#num").text("共" + data.num + "件 金额:");
                        $("#total_price").text(data.total_price);
                    }
                })
            })


            //减少数量
            $(".input-sub").click(function () {
                var _this = $(this);
                var $num = _this.siblings('.input-num').children('span');
                var num = $num.text();
                var price = _this.parents(".num").data('price');

                if (num == 1) {
                    return false;
                }

                num = parseInt(num) - 1;
                if (num == 1) {
                    _this.removeClass('active');
                }

                $num.text(num);

                var hj = num * price;
                _this.parents('.info').find('.hj').text(hj + '元');

                $.ajax({
                    type: 'PATCH',
                    url: '/cart',
                    data: {
                        id: _this.parents(".num").data('id'),
                        type: 'sub'
                    },
                    success: function (data) {
                        $("#num").text("共" + data.num + "件 金额:");
                        $("#total_price").text(data.total_price);
                    }
                })
            })

        })
    </script>
@endsection