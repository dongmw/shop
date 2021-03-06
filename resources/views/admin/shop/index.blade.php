@extends('layouts.admin.app')

@section('content')

    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">品牌管理</strong> /
                    <small>Brand Manage</small>
                </div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a href="{{route('brands.create')}}" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增
                            </a>
                        </div>
                    </div>
                </div>

                <div class="am-u-sm-12 am-u-md-3">
                    <form method="get" action="{{route('brands.index')}}">
                    <div class="am-input-group am-input-group-sm">
                        <input type="text" class="am-form-field" name="keyword" value="{{Request::input('keyword')}}">
                        <span class="am-input-group-btn">
                            <button class="am-btn am-btn-default" type="submit">搜索</button>
                        </span>
                    </div>
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

                                <th class="table-id">编号</th>
                                <th class="table-name">品牌名称</th>
                                <th class="table-thumb">缩略图</th>
                                <th class="table-url">网址</th>
                                <th class="table-desc">品牌描述</th>
                                <th class="table-is_show">是否显示</th>
                                <th class="table-sort_order">排序</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr data-id="{{$brand->id}}">
                                    <td>{{$brand->id}}</td>
                                    <td><a href="#">{{$brand->name}}</a></td>
                                    <td></td>
                                    <td class="am-hide-sm-only">{{$brand->url}}</td>
                                    <td class="am-hide-sm-only">{{$brand->desc}}</td>
                                    <td class="am-hide-sm-only is_something" style="cursor: pointer">{!! is_something($brand) !!}</td>
                                    <td class="am-hide-sm-only">
                                        <input type="text" value="{{$brand->sort_order}}" class="sort_order">
                                    </td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href="{{route('brands.edit',$brand->id)}}" class="am-btn am-btn-default am-btn-xs am-text-secondary" ><span
                                                            class="am-icon-pencil-square-o"></span> 编辑
                                                </a>
                                                <a href="{{route('brands.destroy',$brand->id)}}" data-method="delete"
                                                   data-token="{{csrf_token()}}" data-confirm="确定要删除吗?" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
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
                            共 {{ $brands->total() }} 条记录

                            <div class="am-fr">
                                {{ $brands->appends(Request::all())->links() }}
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
    <!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="assets/js/amazeui.ie8polyfill.min.js"></script>
    <![endif]-->

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="assets/js/jquery.min.js"></script>
    <!--<![endif]-->
    <script src="assets/js/amazeui.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        $(function () {
            //排序
            $('.sort_order').change(function () {
                var data = {
                    sort_order:$(this).val(),
                    id:$(this).parents('tr').data('id')
                }
//                console.log(sort_order);
                $.ajax({
                    type:'PATCH',
                    url:"{{route('brands.sort_order')}}",
                    data:data
                });
            })
            //是否显示
            $('.is_something').click(function () {
                var id = $(this).parents('tr').data('id');
                var _this = $(this);
                $.ajax({
                    type:'PATCH',
                    url:'/admin/shop/brands/is_something',
                    data:{id: id},
                    success:function () {
                        _this.children().toggleClass('am-icon-check am-icon-close');

                    }
                })

            })

        })
    </script>
@endsection