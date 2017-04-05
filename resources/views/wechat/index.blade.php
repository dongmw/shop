@extends('wechat.layout.application')
@section('css')

@endsection

@section('content')
    <div class="page-index" id="home" data-log="首页">
        <div class="index-header">
            <div class="search_bar">
                <a href="/1/#/search/index">
                    <span class="icon icon-search"></span>
                    <span class="text">搜索商品名称</span>
                </a>
            </div>
            <div class="search_bottom"></div>
        </div>

        <!--焦点图-->
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    @foreach($index_ads as $index_ad)
                        <li>
                            <a href=""><img src="{{$index_ad->thumb}}"/></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        <!--推荐商品-->
        <div class="list">
            <div class="section">
                <div class="mcells_auto_fill">
                    <div class="body">
                        @foreach($banner_ads as $banner_ad)
                            <div>
                                <div class="items">
                                    <img src="{{$banner_ad->thumb}}">
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            @foreach($products as $product)
                <div class="section">
                    <div>
                        <div class="item">
                            <div class="img">
                                <img class="ico" src="{{$product->thumb}}">
                                <img class="tag " src="http://c1.mifile.cn/f/i/f/mishop/iic/xp.png">
                            </div>
                            <div class="info">
                                <div class="name"><p>{{$product->name}}</p></div>
                                <div class="brief"><p>{{$product->desc}}</p></div>
                                <div class="price"><p>{{$product->price}}元 起</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        @extends('wechat.layout.__footer')

    </div>
@endsection

@section('js')
    <script defer src="wechat/flexslider/jquery.flexslider.js"></script>
    <script type="text/javascript">
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                directionNav: false
            });
        });
    </script>
@endsection

