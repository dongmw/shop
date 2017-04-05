@extends('layouts.admin.app')
@section('css')
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
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">回收站</strong> /
                    <small>RECYCLE BIN</small>
                </div>
            </div>

            <hr>

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
                                <tr data-id="" id="row" class="parent">
                                    <td class="checkbox">
                                        <input type="checkbox" id=" checked">
                                    </td>
                                    <td class="table-id">{{$product->id}}</td>
                                    <td class="table-thumb"><img src="{{$product->thumb}}" alt="" style="height: 60px;"></td>
                                    <td class="table-name">{{$product->name}}</td>
                                    <td class="table-category">{{  $product->categories->implode('name', ', ')  }}</td>
                                    <td class="table-brand">{{$product->brand->name or ''}}</td>
                                    <td class="table-price">￥{{$product->price}}</td>
                                    <td class="table-putaway">{{$product->putaway}}</td>
                                    <td class="table-stick something"
                                        style="cursor: pointer">{!! something('stick', $product) !!}</td>
                                    <td class="table-recommend something"
                                        style="cursor: pointer">{!! something('recommend', $product) !!}</td>
                                    <td class="table-hot-sale something"
                                        style="cursor: pointer;">{!! something('hot_sale', $product) !!}</td>
                                    <td class="table-new-product something"
                                        style="cursor: pointer">{!! something('new_product', $product) !!}</td>
                                    <td class="table-stock">
                                        <input type="text" value="{{$product->stock}}" style="width: 60px">
                                    </td>
                                    <td class="table-time">{{$product->created_at}}</td>
                                    <td class="table-set">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href="{{route('product.restore',$product->id)}}"
                                                   class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                            class="am-icon-pencil-square-o"></span> 还原
                                                </a>
                                                <a href="{{route('product.force_destroy',$product->id)}}" data-method="delete"
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

    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="assets/js/amazeui.ie8polyfill.min.js"></script>

    <script src="/vendor/daterangepicker/moment.js"></script>
    <script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/js/daterange_config.js"></script>

    <script src="assets/js/jquery.min.js"></script>

    <script src="assets/js/amazeui.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        $(function () {
            $(".something").click(function () {
                var _this = $(this);
                var data = {
                    id: _this.parents("tr").data('id'),
                    attr: _this.data('attr')
                }

                $.ajax({
                    type: "PATCH",
                    url: "{{route('product.something')}}",
                    data: data,
                    success: function (data) {
                        _this.toggleClass('am-icon-close am-icon-check');
                    }
                });
            });

        })
    </script>
@endsection