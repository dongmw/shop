@extends('wechat.layout.application')

@section('content')
    <div class="page-list" data-log="商品列表">
        <!--
        <div class="header">
            <div class="left">
                <a class="home"><img src="http://s1.mi.com/m/images/m/icon_back_n.png" class="ib"></a>
            </div>
            <div class="tit"><h2 data-log="HEAD-标题-商品列表"><span class="title">商品列表</span></h2></div>

            <div class="right">
                <a href="/1/#/search/index">
                    <div class="icon icon-search"></div>
                </a>
            </div>
        </div>
        -->
        <ol class="version">
            @foreach($categories->products as $product)
                <li class="version-item" onclick="location.href='/product/{{$product->id}}'">

                        <div class="version-item-img"><img
                                    src="{{$product->thumb}}?width=150&amp;height=150">
                        </div>
                        <div class="version-item-intro">
                            <div class="version-item-name"><p>{{$product->name}}</p></div>
                            <div class="version-item-intro-price"><span>{{$product->price}}元</span></div>
                        </div>

                </li>
            @endforeach
        </ol>
        @extends('wechat.layout.__footer')

    </div>
@endsection