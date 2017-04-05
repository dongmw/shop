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
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">广告列表</strong> /
                    <small>AD LIST</small>
                </div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a href="{{Route('ad.create')}}" class="am-btn am-btn-default"><span
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
                                <th class="table-name">标题</th>
                                <th class="table-category">所属分类</th>
                                <th class="table-desc">描述</th>
                                <th class="table-sort_order">排序</th>
                                <th class="table-time">上架日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($ads as $ad)
                                <tr data-id="{{$ad->id}}" id="row_{{$ad->id}}" class="parent">
                                    <td class="checkbox">
                                        <input type="checkbox" id=" checked">
                                    </td>
                                    <td class="table-id">{{$ad->id}}</td>
                                    <td class="table-thumb"><img src="{{$ad->thumb}}" style="height: 60px;" alt=""></td>
                                    <td class="table-name">
                                        <a target="_blank" href="{{$ad->url}}">{{$ad->name}}</a>
                                    </td>
                                    <td class="table-category">{{$ad->AdCategory->name}}</td>
                                    <td class="table-desc">{{$ad->desc}}</td>
                                    <td class="table-sort_order">
                                        <input type="text" value="{{$ad->sort_order}}" style="width: 60px">
                                    </td>
                                    <td class="table-time">{{$ad->created_at}}</td>
                                    <td class="table-set">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href="{{route('ad.edit',$ad->id)}}"
                                                   class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                            class="am-icon-pencil-square-o"></span> 编辑
                                                </a>
                                                <a href="{{route('ad.destroy', $ad->id)}}" data-method="delete"
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="assets/js/amazeui.ie8polyfill.min.js"></script>

    <script src="/vendor/daterangepicker/moment.js"></script>
    <script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/js/daterange_config.js"></script>

    <script src="assets/js/amazeui.min.js"></script>
    <script src="assets/js/app.js"></script>
    {{--<script>--}}
        {{--$(function () {--}}
            {{--$(".is_something").click(function () {--}}
                {{--var _this = $(this);--}}
                {{--var data = {--}}
                    {{--id: _this.parents("tr").data('id'),--}}
                    {{--attr: _this.data('attr')--}}
                {{--}--}}

                {{--$.ajax({--}}
                    {{--type: "PATCH",--}}
                    {{--url: "{{route('product.is_something')}}",--}}
                    {{--data: data,--}}
                    {{--success: function (data) {--}}
                        {{--_this.toggleClass('am-icon-close am-icon-check');--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}

        {{--})--}}
    {{--</script>--}}
@endsection