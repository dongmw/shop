<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/os.css">
    <link rel="stylesheet" href="/vendor/daterangepicker/daterangepicker.css">
    <style>
        .thumb {
            max-height: 60px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

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
                            <a href="<?php echo e(Route('product.create')); ?>" class="am-btn am-btn-default"><span
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
                                <?php $__currentLoopData = $filter_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <optgroup label="<?php echo e($category->name); ?>">
                                        <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($c->id); ?>" <?php if($c->id == Request::input('category_id')): ?> selected <?php endif; ?>><?php echo e($c->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>

                        </div>

                        <div class="am-form-group">
                            <select data-am-selected="{btnSize: 'sm', maxHeight: 360, searchBox: 1}" name="brand_id"
                                    id="" style="display: none;">
                                <option value="-1">所有品牌</option>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                            <input type="text" id="created_at" placeholder="选择时间日期" name="created_at" value="<?php echo e(Request::input('created_at')); ?>"
                                   class="am-form-field am-input-sm">
                        </div>

                        <button type="submit" class="am-btn am-btn-default am-btn-sm">查询</button>
                    </form>

                </div>
            </div>


            <?php echo $__env->make('layouts.admin._flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id="<?php echo e($product->id); ?>" id="row" class="parent">
                                    <td class="checkbox">
                                        <input type="checkbox" id="<?php echo e($product->id); ?> checked">
                                    </td>
                                    <td class="table-id"><?php echo e($product->id); ?></td>
                                    <td class="table-thumb"><img src="<?php echo e($product->thumb); ?>" style="height: 60px;" alt=""></td>
                                    <td class="table-name"><?php echo e($product->name); ?></td>
                                    <td class="table-category"><?php echo e($product->categories->implode('name', ', ')); ?></td>
                                    <td class="table-brand"><?php echo e(isset($product->brand->name) ? $product->brand->name : ''); ?></td>
                                    <td class="table-price">￥<?php echo e($product->price); ?></td>
                                    <td class="table-putaway"><?php echo e($product->putaway); ?></td>

                                    <?php $__currentLoopData = array('stick', 'recommend', 'hot_sale', 'new_product'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="am-hide-sm-only" style="cursor: pointer">
                                            <?php echo it_something($attr, $product); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    
                                        
                                    
                                        
                                    
                                        
                                    
                                        


                                    <td class="table-stock">
                                        <input type="text" value="<?php echo e($product->stock); ?>" style="width: 60px">
                                    </td>
                                    <td class="table-time"><?php echo e($product->created_at); ?></td>
                                    <td class="table-set">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href="<?php echo e(route('product.edit',$product->id)); ?>"
                                                   class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                            class="am-icon-pencil-square-o"></span> 编辑
                                                </a>
                                                <a href="<?php echo e(route('product.destroy',$product->id)); ?>" data-method="delete"
                                                   data-token="<?php echo e(csrf_token()); ?>" data-confirm="确定要删除吗?"
                                                   class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                                    <span class="am-icon-trash-o"></span> 删除
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                        <div class="am-cf">
                            

                            <div class="am-fr">
                                
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

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="/vendor/daterangepicker/moment.js"></script>
    <script src="/vendor/moment/locale/zh-cn.js"></script>
    <script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/js/daterange_config.js"></script>
    <script>
        $(function () {

//            //是否...
//            $(".is_something").click(function () {
//                var _this = $(this);
//                var data = {
//                    id: _this.parents("tr").data('id'),
//                    attr: _this.data('attr')
//                }
//
//                $.ajax({
//                    type: "PATCH",
//                    url: "/shop/product/is_something",
//                    data: data,
//                    success: function (data) {
//                        _this.toggleClass('am-icon-close am-icon-check');
//                    }
//                });
//            });


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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>