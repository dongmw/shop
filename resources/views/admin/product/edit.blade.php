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


                <form class="am-form" action="{{route('product.update',$product->id)}}" method="post">
                    {!! csrf_field() !!}
                    {!! method_field('put') !!}

                    <div class="am-tabs am-margin" data-am-tabs="">
                        <ul class="am-tabs-nav am-nav am-nav-tabs">
                            <li class="am-active"><a href="#tab1">通用信息</a></li>
                            <li class=""><a href="#tab2">商品介绍</a></li>
                            <li class=""><a href="#tab3">商品相册</a></li>
                        </ul>

                        <div class="am-tabs-bd"
                             style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <div class="am-tab-panel am-fade am-active am-in" id="tab1">

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        所属栏目
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <div class="am-selected am-dropdown " id="am-selected-l3v5l" data-am-dropdown=""
                                             style="width: 100%;">
                                            <select multiple data-am-selected="{btnWidth: '100%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                                    name="category_id[]">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" @if($p_categories->contains($category->id)) selected @endif>
                                                        {{$category->name}}
                                                    </option>
                                                        @foreach($category->children as $c)
                                                            <option value="{{$c->id}}" @if($p_categories->contains($c->id)) selected @endif>
                                                                {{$c->name}}
                                                            </option>
                                                        @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        商品名称
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm" name="name" value="{{$product->name}}">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        单价
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="te
                                        xt" class="am-input-sm" name="price" value="{{$product->price}}">
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        商品品牌
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <div class="am-selected am-dropdown " id="am-selected-qn2b7" data-am-dropdown=""
                                             style="width: 100%;">

                                            <select data-am-selected="{btnWidth: '100%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                                    name="brand_id">

                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}" @if($brand->id == $product->brand_id) selected @endif>
                                                        <span class="am-selected-text">{{$brand->name}}</span> <i class="am-icon-check"></i>
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
                                        <input type="text" class="am-input-sm" name="stock" value="{{$product->stock}}">
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
                                            <input type="hidden" name="thumb" value="{{$product->thumb}}">
                                        </div>


                                        <hr data-am-widget="divider" style=""
                                            class="am-divider am-divider-dashed am-no-layout">

                                        <div>
                                            <img src="{{$product->thumb}}" id="img_show" style="max-height: 200px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top sort">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        描述信息
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <textarea rows="4" name="desc">{{$product->desc}}</textarea>
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
                                            <script id="container" name="content" type="text/plain">{!! $product->content !!}
                                            </script>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="am-tab-panel am-fade" id="tab3">

                                <ul data-am-widget="gallery"
                                    class="am-gallery am-avg-sm-2 am-avg-md-4 am-avg-lg-6 am-gallery-imgbordered xGallery"
                                    data-am-gallery="{ pureview: true }">

                                    @foreach($product->product_galleries as $gallery)
                                        <li>
                                            <div class="am-gallery-item">
                                                <a href="{{$gallery->img}}" class="">
                                                    <img src="{{$gallery->img}}"/>
                                                </a>
                                                <div class="file-panel">
                                                    <span class="cancel" data-id="{{$gallery->id}}">删除</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

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
    <script type="text/javascript" src="/vendor/webupload/dist/webuploader.js"></script>
    <script type="text/javascript" src="/vendor/webupload/upload.js"></script>


    <!-- 配置文件 -->
    <script type="text/javascript" src="/vendor/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/vendor/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>

@endsection
