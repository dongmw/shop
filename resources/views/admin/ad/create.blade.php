@extends('layouts.admin.app')

@section('css')
    <link rel="stylesheet" href="/vendor/markdown/css/editormd.min.css"/>
@endsection

@section('content')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新增广告</strong> /
                <small>Create A New Ad</small>
            </div>
        </div>

        @include('layouts.admin._flash')
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">

                <div class="am-tab-panel">
                    <form class="am-form" action="{{route('ad.store')}}" method="post">
                        {!! csrf_field() !!}

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                所属分类
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">

                                <select data-am-selected="{btnWidth: '100%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                        name="ad_category_id">
                                    @foreach($ad_categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                广告标题
                            </div>
                            <div class="am-u-sm-8 am-u-md-4">
                                <input type="text" class="am-input-sm" name="name" value="{{ old('name')}}">
                            </div>
                            <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                广告图
                            </div>

                            <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                                <div class="am-form-group am-form-file new_thumb">
                                    <button type="button" class="am-btn am-btn-secondary am-btn-sm">
                                        <i class="am-icon-cloud-upload" id="loading"></i> 上传新的缩略图
                                    </button>
                                    <input type="file" id="image_upload">
                                    <input type="hidden" name="image_id">
                                </div>


                                <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed"/>

                                <div>
                                    <img src="" id="img_show" style="max-height: 200px;">
                                </div>
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                描述信息
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <textarea rows="4" name="desc"></textarea>
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                广告地址
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input placeholder="请输入广告地址" type="url" class="am-input-sm" name="url"
                                       value="{{ old('url')}}">
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                排序
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input type="text" name="sort_order" class="am-input-sm" value="99">
                            </div>
                        </div>

                        <div class="am-margin">
                            <button type="submit" class="am-btn am-btn-primary am-radius">提交保存</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/js/jquery.html5-fileupload.js"></script>
    <script src="/js/upload.js"></script>
    {{--<script src="/vendor/ckfinder/ckfinder.js"></script>--}}
    {{--<script src="/js/ck_upload.js"></script>--}}
@endsection
