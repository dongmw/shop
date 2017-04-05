@extends('wechat.layout.application')


@section('content')
    <div class="page-category" data-log="商品分类">

        <div class="page-category-wrap">
            @foreach($categories as $category)
                <div class="list-wrap" id="m0">
                    <h3 class="list_title">{{$category->name}}</h3>
                    <ol class="list_category">
                        @foreach($category->children as $child)
                            <li onclick="location.href='/product?category_id={{$child->id}}'">
                                <div class="img"><img src="{{$child->thumb}}"></div>
                                <div class="name"><span>{{$child->name}}</span></div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endforeach
        </div>
        @extends('wechat.layout.__footer')

    </div>
@endsection