@extends('layouts.admin.app')
@section('css')
    <link rel="stylesheet" href="/select2/css/select2.min.css">

    <link rel="stylesheet" href="/vendor/webupload/dist/webuploader.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/webupload/style.css" />
@endsection
@section('content')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新增商品</strong> /
                <small>Create A New Good</small>
            </div>
        </div>

        @include('layouts.admin._flash')
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">


                <form class="am-form" action="{{route('product.store')}}"  method="post">
                    {!! csrf_field() !!}

                    <div class="am-tabs am-margin" data-am-tabs="">
                        <ul class="am-tabs-nav am-nav am-nav-tabs">
                            <li class="am-active"><a href="#tab1">通用信息</a></li>
                            <li class=""><a href="#tab2">商品介绍</a></li>
                            <li class=""><a href="#tab3">商品相册</a></li>
                        </ul>

                        <div class="am-tabs-bd">
                            <div class="am-tab-panel am-fade am-active am-in" id="tab1">

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        所属栏目
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">

                                            <select multiple data-am-selected="{btnWidth: '100%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                                    name="category_id[]">
                                                @foreach($categories as $category)
                                                    <optgroup label="{{$category->name}}">
                                                        @foreach($category->children as $c)
                                                            <option value="{{$c->id}}"> {{$c->name}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>

                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        商品名称
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm" name="name">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        单价
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="price" value="">
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        商品品牌
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <div class="am-selected am-dropdown " id="am-selected-qn2b7" data-am-dropdown=""
                                             style="width: 100%;">

                                            <select class="am-selected-list" name="brand_id"
                                                    style="max-height: 360px; overflow-y: scroll;">

                                                @foreach($brands as $brand)
                                                    <option class="" data-index="1" data-group="0" value="{{$brand->id}}">
                                                        <span class="am-selected-text">
                                                            {{$brand->name}}
                                                        </span>
                                                        <i class="am-icon-check"></i>
                                                    </option>
                                                @endforeach

                                            </select>
                                            <div class="am-selected-hint"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        库存
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="stock" value="-1">
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        缩略图
                                    </div>

                                    <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                                        <div class="am-form-group am-form-file new_thumb">
                                            <button type="button" class="am-btn am-btn-secondary am-btn-sm">
                                                <i class="am-icon-cloud-upload" id="loading"></i> 上传新的缩略图
                                            </button>
                                            <input type="file" id="thumb_upload">
                                            <input type="hidden" name="thumb">
                                        </div>
                                        <hr data-am-widget="divider" style=""
                                            class="am-divider am-divider-dashed am-no-layout">

                                        <div>
                                            <img src="" id="img_show" style="max-height: 200px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top sort">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        描述信息
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <textarea rows="4" name="desc"></textarea>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        上架
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="1" name="putaway" checked=""> 是
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="0" name="putaway"> 否
                                        </label>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        加入推荐
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="hidden" name="stick" value="0">
                                        <input type="hidden" name="recommend" value="0">
                                        <input type="hidden" name="hot_sale" value="0">
                                        <input type="hidden" name="new_product" value="0">

                                        <div class="am-btn-group" data-am-button="">
                                            <label class="am-btn am-btn-default am-btn-xs am-round">
                                                <input type="checkbox" name="stick" value="1"> 置顶
                                            </label>
                                            <label class="am-btn am-btn-default am-btn-xs am-round">
                                                <input type="checkbox" name="recommend" value="1"> 推荐
                                            </label>
                                            <label class="am-btn am-btn-default am-btn-xs am-round">
                                                <input type="checkbox" name="hot_sale" value="1"> 热销
                                            </label>
                                            <label class="am-btn am-btn-default am-btn-xs am-round">
                                                <input type="checkbox" name="new_product" value="1"> 新品
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="am-tab-panel am-fade" id="tab2">
                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-12 am-u-md-12">
                                        <div id="markdown" class="editormd editormd-vertical"
                                             style="width: 100%; height: 600px;">
                                            <script id="container" name="content" type="text/plain">这里写你的初始化内容
                                            </script>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="am-tab-panel am-fade" id="tab3">
                                <div id="uploader">
                                    <div class="queueList">
                                        <div id="dndArea" class="placeholder">
                                            <div id="filePicker"></div>
                                            <p>或将照片拖到这里，单次最多可选300张</p>
                                        </div>
                                    </div>
                                    <div class="statusBar" style="display:none;">
                                        <div class="progress">
                                            <span class="text">0%</span>
                                            <span class="percentage"></span>
                                        </div>
                                        <div class="info"></div>
                                        <div class="btns">
                                            <div id="filePicker2"></div>
                                            <div class="uploadBtn">开始上传</div>
                                        </div>
                                    </div>

                                    <div id="imgs"></div>
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
    //批量图片上传引用
    <script type="text/javascript" src="/vendor/webupload/dist/webuploader.js"></script>
    <script type="text/javascript" src="/vendor/webupload/upload.js"></script>
    //单张图片上传
    <script src="/js/jquery.html5-fileupload.js"></script>
    <script src="/js/upload.js"></script>

    <!-- 配置文件 -->
    <script type="text/javascript" src="/vendor/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/vendor/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
            initialFrameHeight:"100%"
        });
    </script>

@endsection
