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
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新增抽奖</strong> /
                    <small>NEW LOTTERY</small>
                </div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a href="{{route('wechat.create')}}" class="am-btn am-btn-default"><span
                                        class="am-icon-plus"></span> 新增抽奖
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

            <div class="am-tabs am-margin" data-am-tabs="">
                <ul class="am-tabs-nav am-nav am-nav-tabs">
                    <li class="am-active"><a href="#tab1">奖品信息</a></li>
                    <li class=""><a href="#tab2">中奖信息</a></li>

                </ul>

                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-fade am-active am-in" id="tab1">

                        <div class="am-g">
                            <div class="am-u-sm-12">
                                <form class="am-form">
                                    <table class="am-table am-table-striped am-table-hover table-main">
                                        <thead>
                                        <tr>
                                            <th class="table-brand">ID</th>
                                            <th class="table-brand">一等奖</th>
                                            <th class="table-price">二等奖</th>
                                            <th class="table-putaway">三等奖</th>
                                            <th class="table-stick">状态</th>
                                            <th class="table-recomment">次数</th>
                                            <th class="table-hot-sale">时间</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($raffles as $raffle)
                                            <tr data-id="{{$raffle->id}}" id="row" class="parent">
                                                <td class="table-price">{{$raffle->id}}</td>
                                                <td class="table-price">{{$raffle->first}}</td>
                                                <td class="table-putaway">{{$raffle->second}}</td>
                                                <td class="table-putaway">{{$raffle->third}}</td>
                                                <td class="table-putaway">{{$raffle->status}}</td>
                                                <td class="table-putaway">{{$raffle->times}}</td>
                                                <td class="table-putaway">{{$raffle->time}}</td>
                                                <td class="table-set">
                                                    <div class="am-btn-toolbar">
                                                        <div class="am-btn-group am-btn-group-xs">

                                                            <a href="{{route('wechat.destroy',$raffle->id)}}"
                                                               data-method="delete"
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
                                        {{--共 {{ $raffles->total() }} 条记录--}}

                                        <div class="am-fr">
                                            {{--{{ $brands->appends(Request::all())->links() }}--}}
                                        </div>
                                    </div>
                                    <hr/>

                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="am-tab-panel am-fade" id="tab2">
                        <div class="am-g">
                            <div class="am-u-sm-12">
                                <form class="am-form">
                                    <table class="am-table am-table-striped am-table-hover table-main">
                                        <thead>
                                        <tr>
                                            <th class="table-brand">中奖ID</th>
                                            <th class="table-brand">中奖用户</th>
                                            <th class="table-set">中奖奖项</th>
                                            <th class="table-set">中奖时间</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($lotteries as $lottery)
                                            <tr data-id="{{$lottery->id}}" id="row" class="parent">
                                                <td class="table-price">{{$lottery->id}}</td>
                                                <td class="table-price">{{$lottery->nickname}}</td>
                                                <td class="table-putaway">{{$lottery->prize}}</td>
                                                <td class="table-putaway">{{$lottery->created_at}}</td>

                                                <td class="table-set">
                                                    <div class="am-btn-toolbar">
                                                        <div class="am-btn-group am-btn-group-xs">
                                                            <a href=""
                                                               data-method="delete"
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
{{--                                        共 {{ $lotteries->total() }} 条记录--}}

                                        <div class="am-fr">
                                            {{--{{ $brands->appends(Request::all())->links() }}--}}
                                        </div>
                                    </div>
                                    <hr/>

                                </form>
                            </div>

                        </div>
                    </div>
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