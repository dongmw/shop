@extends('layouts.admin.app')
@section('content')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">自定义菜单</strong> /
                <small>Customer Menus</small>
            </div>
        </div>

        @include('layouts.admin._flash')

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a href="{{route('wechat.destroy')}}" class="am-btn am-btn-danger" id="destroy_checked"
                           data-method="delete"
                           data-token="{{csrf_token()}}" data-confirm="确认删除菜单吗?此操作不可恢复!">
                            <span class="am-icon-trash-o"></span> 删除菜单
                        </a>
                    </div>
                </div>
            </div>

            <div class="am-u-sm-12 am-u-md-12">

                <div class="am-tab-panel">

                    <form class="am-form " action="{{route('wechat.update')}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="am-tabs" data-am-tabs style="margin:1.6rem 0;">
                            <ul class="am-tabs-nav am-nav am-nav-tabs">
                                <li class="am-active"><a href="#tab0">菜单一</a></li>
                                <li><a href="#tab1">菜单二</a></li>
                                <li><a href="#tab2">菜单三</a></li>
                            </ul>

                            <div class="am-tabs-bd">
                                @for ($i = 0; $i < 3; $i++)
                                    <?php
                                    $button = isset($buttons["$i"]) ? $buttons["$i"] : "";
                                    ?>
                                    @include('admin.wechat._form', ['button' => $button, 'index'=>$i])
                                @endfor
                            </div>
                        </div>

                        <div class="am-margin">
                            <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection