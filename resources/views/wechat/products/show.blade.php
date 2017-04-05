@extends('wechat.layout.application')

@section('content')
    <div class="page-product-view" data-log="商品详情">

        <div class="header">
            <div class="left"><a
                        onclick="_msq.push(['trackEvent', '8fb4bea51daee8a5-346f31c749f6e40d', '', 'pcpid']);history.go(-1)"
                        class="home" data-stat-id="346f31c749f6e40d"><img
                            src="http://s1.mi.com/m/images/m/icon_back_n.png" class="ib"></a><!--vue-if--><!--vue-if-->
            </div>
            <div class="tit"><!--vue-if--></div>
            <div class="right"><a href="javascript:;" data-event="30000000110001001" data-stat-id="6c93ea1c6bb6eb01"
                                  onclick="_msq.push(['trackEvent', '8fb4bea51daee8a5-6c93ea1c6bb6eb01', 'javascript:;', 'pcpid']);">
                    <div class="icon icon-search"></div>
                </a></div>
        </div>

        <div class="product-view">
            <div class="b1">
                <img src="{{$product->thumb}}">
            </div>
            <div class="b2">
                <div class="b21">
                    <div class="b211">
                        <div class="name"><p>{{$product->name}} </p></div>
                        <div class="price"><strong>{{$product->price}}元</strong></div>
                    </div>
                    <div class="b212">
                        <div class="icon-fenxiang"></div>
                    </div>
                </div>
                <div class="b22">
                    <p>{{$product->desc}}</p>
                </div>
            </div>
            <div class="mt20" style="display: none;"></div>

            <!--<ul class="b3">-->
            <!--<li><span class="on">白色</span></li>-->
            <!--</ul>-->

            <ul class="b3" style="display: none;">
                <li><span>通用</span></li>
            </ul>

            <div class="ui-b7">
                <h3>为您推荐</h3>
                <div class="ui-carousel-container">
                    <div class="ui-carousel-viewport">
                        <a href="/1/#/product/view?product_id=2392">
                            <img src="http://i8.mifile.cn/v1/a1/T1NPx_BTZT1RXrhCrK.jpg?width=200&amp;height=200">
                        </a>
                        <a href="/1/#/product/view?product_id=2392">
                            <img src="http://i8.mifile.cn/v1/a1/T1NPx_BTZT1RXrhCrK.jpg?width=200&amp;height=200">
                        </a>
                        <a href="/1/#/product/view?product_id=2392">
                            <img src="http://i8.mifile.cn/v1/a1/T1NPx_BTZT1RXrhCrK.jpg?width=200&amp;height=200">
                        </a>
                    </div>
                </div>
            </div>

            <div class="b7">
                <div class="b70">
                    <a href="/">
                        <div class="icon-home"></div>
                    </a>
                </div>
                <div class="b72">
                    <!--<a href="javascript:;" class="off">暂时缺货</a>-->
                    <a href="javascript:;" id="add_to_cart">立即购买</a>
                </div>

                <div class="b73">
                    <a href="/cart">
                        <div class="icon-gouwuche"></div>
                    </a>
                </div>
            </div>
            <a href="javascript:;" id="top" style="visibility: visible;">
                <img src="http://s1.mi.com/m/images/m/top.png">
            </a>
        </div>
        <div class="share-component"></div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $('#add_to_cart').click(function () {
                $.ajax({
                    type: 'post',
                    url: '/cart',
                    data: {product_id:"{{$product->id}}"},
                    success:function (data) {
                        //console.log(data);
                        location.href = '/cart';

                    }
                })

            })

        })
    </script>
@endsection
