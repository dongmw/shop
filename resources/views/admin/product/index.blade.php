@extends('layouts.admin.app')
@section('css')
    <link rel="stylesheet" href="/css/os.css">
    <link rel="stylesheet" href="/vendor/daterangepicker/daterangepicker.css">
    <style>
        .thumb {
            max-height: 60px;
        }
    </style>
@endsection
@section('content')

    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">商品列表</strong> /
                    <small>GOOD LIST</small>
                </div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a href="{{Route('product.create')}}" class="am-btn am-btn-default"><span
                                        class="am-icon-plus"></span> 新增
                            </a>
                            <a type="button" class="am-btn am-btn-default" href="">
                                <span class="am-icon-arrows-alt"></span> 删除
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-12">
                    <form class="am-form-inline" role="form" method="get">

                        <div class="am-form-group">
                            <input type="text" name="name" class="am-form-field am-input-sm" placeholder="商品名" value="">
                        </div>

                        <div class="am-form-group">
                            <select data-am-selected="{btnSize: 'sm', maxHeight: 360, searchBox: 1}" name="category_id"
                                    style="display: none;">
                                <optgroup label="请选择">
                                    <option value="-1">所有分类</option>
                                </optgroup>
                                @foreach($filter_categories as $category)
                                    <optgroup label="{{$category->name}}">
                                        @foreach($category->children as $c)
                                            <option value="{{$c->id}}" @if($c->id == Request::input('category_id')) selected @endif>{{$c->name}}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach

                            </select>

                        </div>

                        <div class="am-form-group">
                            <select data-am-selected="{btnSize: 'sm', maxHeight: 360, searchBox: 1}" name="brand_id"
                                    id="" style="display: none;">
                                <option value="-1">所有品牌</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="am-form-group">
                            <div class="am-btn-group" data-am-button="">
                                <label class="am-btn am-btn-default am-btn-sm am-radius  am-active">
                                    <input type="checkbox" name="is_top" value="1"> 置顶
                                </label>
                                <label class="am-btn am-btn-default am-btn-sm am-radius  am-active">
                                    <input type="checkbox" name="is_recommend" value="1"> 推荐
                                </label>
                                <label class="am-btn am-btn-default am-btn-sm am-radius  am-active">
                                    <input type="checkbox" name="is_hot" value="1"> 热销
                                </label>
                                <label class="am-btn am-btn-default am-btn-sm am-radius  am-active">
                                    <input type="checkbox" name="is_new" value="1"> 新品
                                </label>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <select data-am-selected="{btnSize: 'sm'}" name="is_onsale" id="" style="display: none;">
                                <option value="-1">上架状态</option>
                                <option value="1">上架</option>
                                <option value="0">下架</option>
                            </select>

                        </div>

                        <div class="am-form-group">
                            <input type="text" id="created_at" placeholder="选择时间日期" name="created_at" value="{{ Request::input('created_at') }}"
                                   class="am-form-field am-input-sm">
                        </div>

                        <button type="submit" class="am-btn am-btn-default am-btn-sm">查询</button>
                    </form>

                </div>
            </div>


            @include('layouts.admin._flash')

            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="checkbox">
                                    <input type="checkbox" id="checked">
                                </th>
                                <th class="table-id">ID</th>
                                <th class="table-thumb">缩略图</th>
                                <th class="table-name">商品名称</th>
                                <th class="table-category">所属分类</th>
                                <th class="table-brand">品牌</th>
                                <th class="table-price">单价</th>
                                <th class="table-putaway">上架</th>
                                <th class="table-stick">置顶</th>
                                <th class="table-recomment">推荐</th>
                                <th class="table-hot-sale">热销</th>
                                <th class="table-new-product">新品</th>
                                <th class="table-stock">库存</th>
                                <th class="table-time">上架日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr data-id="{{$product->id}}" id="row" class="parent">
                                    <td class="checkbox">
                                        <input type="checkbox" id="{{$product->id}} checked">
                                    </td>
                                    <td class="table-id">{{$product->id}}</td>
                                    <td class="table-thumb"><img src="{{$product->thumb}}" style="height: 60px;" alt=""></td>
                                    <td class="table-name">{{$product->name}}</td>
                                    <td class="table-category">{{  $product->categories->implode('name', ', ')  }}</td>
                                    <td class="table-brand">{{$product->brand->name or ''}}</td>
                                    <td class="table-price">￥{{$product->price}}</td>
                                    <td class="table-putaway">{{$product->putaway}}</td>

                                    @foreach (array('stick', 'recommend', 'hot_sale', 'new_product') as $attr)
                                        <td class="am-hide-sm-only" style="cursor: pointer">
                                            {!! it_something($attr, $product) !!}
                                        </td>
                                    @endforeach

                                    {{--<td class="table-stick something"--}}
                                        {{--style="cursor: pointer">{!! something('stick', $product) !!}</td>--}}
                                    {{--<td class="table-recommend something"--}}
                                        {{--style="cursor: pointer">{!! something('recommend', $product) !!}</td>--}}
                                    {{--<td class="table-hot-sale something"--}}
                                        {{--style="cursor: pointer;">{!! something('hot_sale', $product) !!}</td>--}}
                                    {{--<td class="table-new-product something"--}}
                                        {{--style="cursor: pointer">{!! something('new_product', $product) !!}</td>--}}


                                    <td class="table-stock">
                                        <input type="text" value="{{$product->stock}}" style="width: 60px">
                                    </td>
                                    <td class="table-time">{{$product->created_at}}</td>
                                    <td class="table-set">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href="{{route('product.edit',$product->id)}}"
                                                   class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                            class="am-icon-pencil-square-o"></span> 编辑
                                                </a>
                                                <a href="{{route('product.destroy',$product->id)}}" data-method="delete"
                                                   data-token="{{csrf_token()}}" data-confirm="确定要删除吗?"
                                                   class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                                    <span class="am-icon-trash-o"></span> 删除
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                        <div class="am-cf">
                            {{--共 {{ $brands->total() }} 条记录--}}

                            <div class="am-fr">
                                {{--{{ $brands->appends(Request::all())->links() }}--}}
                            </div>
                        </div>
                        <hr/>

                    </form>
                </div>

            </div>
        </div>

        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
        </footer>

    </div>

    @endsection

@section('js')
    <script src="/vendor/daterangepicker/moment.js"></script>
    <script src="/vendor/moment/locale/zh-cn.js"></script>
    <script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/js/daterange_config.js"></script>
    <script>
        $(function () {
            $(".it_something").click(function () {
                var _this = $(this);
                var data = {
                    id: _this.parents("tr").data('id'),
                    attr: _this.data('attr')
                }

                $.ajax({
                    type: "PATCH",
                    url: "/admin/shop/product/it_something",
                    data: data,
                    success: function (data) {
                        _this.toggleClass('am-icon-close am-icon-check');
                    }
                });
            });

        })
    </script>
@endsection