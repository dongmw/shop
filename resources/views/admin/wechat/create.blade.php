@extends('layouts.admin.app')
@section('css')
    <link rel="stylesheet" href="/css/os.css">
    <link rel="stylesheet" href="/vendor/daterangepicker/daterangepicker.css">
@endsection
@section('content')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新增抽奖</strong> /
                <small>Create A New Lottery</small>
            </div>
        </div>

        @include('layouts.admin._flash')
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">


                <form class="am-form" action="{{route('wechat.store')}}"  method="post">
                    {!! csrf_field() !!}

                    <div class="am-tabs am-margin" data-am-tabs="">
                        <ul class="am-tabs-nav am-nav am-nav-tabs">

                            <li class="am-active"><a href="#tab1">抽奖设置</a></li>

                        </ul>

                        <div class="am-tabs-bd">
                            <div class="am-tab-panel am-fade am-active am-in" id="tab1">

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        一等奖：
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="first" value="">
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        二等奖：
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="second" value="">
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        三等奖：
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="third" value="">
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        抽奖次数
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="times" value="">
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        抽奖时间
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end am-form-group">

                                        <input type="text" id="created_at" placeholder="选择时间日期" name="time" value="{{ Request::input('created_at') }}"
                                               class="am-form-field am-input-sm">
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        奖项状态
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="hidden" name="status" value="0">
                                        <div class="am-btn-group" data-am-button="">
                                            <label class="am-btn am-btn-default am-btn-xs am-round">
                                                <input type="checkbox" name="status" value="1"> 置顶
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="am-margin">
                        <button type="submit" class="am-btn am-btn-primary am-radius">提交保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="/vendor/daterangepicker/moment.js"></script>
    <script src="/vendor/moment/locale/zh-cn.js"></script>
    <script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/js/daterange_config.js"></script>


    <script type="text/javascript">

    </script>

@endsection
