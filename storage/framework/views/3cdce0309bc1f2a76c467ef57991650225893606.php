<?php $__env->startSection('content'); ?>

    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">商品分类</strong> /
                    <small>GOOD CATEGORY MANAGE</small>
                </div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a href="<?php echo e(Route('product_category.create')); ?>" class="am-btn am-btn-default"><span
                                        class="am-icon-plus"></span> 新增
                            </a>
                            <button type="button" class="am-btn am-btn-success parents" id="show_all" href="">
                                <span class="am-icon-arrows-alt"></span> 展开所有
                            </button>
                        </div>
                    </div>
                </div>


            </div>

            <?php echo $__env->make('layouts.admin._flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>

                                <th class="table-id">编号</th>

                                <th class="table-thumb">缩略图</th>
                                <th class="table-url">分类名</th>
                                <th class="table-desc">商品分类</th>
                                <th class="table-is_show">是否显示</th>
                                <th class="table-sort_order">排序</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id="<?php echo e($category->id); ?>" id="row_<?php echo e($category->id); ?>" class="parent">
                                    <td><?php echo e($category->id); ?></td>
                                    <td><img src="<?php echo e($category->thumb); ?>" alt="" style="height: 60px;"></td>
                                    <td class="am-hide-sm-only"><?php echo e($category->name); ?></td>
                                    <td class="am-hide-sm-only"></td>
                                    <td class="am-hide-sm-only is_something"
                                        style="cursor: pointer"><?php echo is_something($category); ?></td>
                                    <td class="am-hide-sm-only">
                                        <input type="text" value="<?php echo e($category->sort_order); ?>"
                                               class="am-input-sm sort_order">
                                    </td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href="<?php echo e(Route('product_category.edit',$category->id)); ?>"
                                                   class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                            class="am-icon-pencil-square-o"></span> 编辑
                                                </a>
                                                <a href="<?php echo e(Route('product_category.destroy',$category->id)); ?>" data-method="delete"
                                                   data-token="<?php echo e(csrf_token()); ?>" data-confirm="确定要删除吗?"
                                                   class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                                    <span class="am-icon-trash-o"></span> 删除
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-id="<?php echo e($child->id); ?>" class="children child_row_<?php echo e($category->id); ?>" style="display: none">
                                        <td><?php echo e($child->id); ?></td>
                                        <td><img src="<?php echo e($child->thumb); ?>" alt="" style="height: 60px;"></td>
                                        <td class="am-hide-sm-only">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo e($child->name); ?></td>
                                        <td class="am-hide-sm-only"></td>
                                        <td class="am-hide-sm-only is_something"
                                            style="cursor: pointer"><?php echo is_something($child); ?></td>
                                        <td class="am-hide-sm-only">
                                            <input type="text" value="<?php echo e($child->sort_order); ?>"
                                                   class="am-input-sm sort_order">
                                        </td>
                                        <td>
                                            <div class="am-btn-toolbar">
                                                <div class="am-btn-group am-btn-group-xs">
                                                    <a href="<?php echo e(Route('product_category.edit',$child->id)); ?>"
                                                       class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                                class="am-icon-pencil-square-o"></span> 编辑
                                                    </a>
                                                    <a href="<?php echo e(Route('product_category.destroy',$child->id)); ?>" data-method="delete"
                                                       data-token="<?php echo e(csrf_token()); ?>" data-confirm="确定要删除吗?"
                                                       class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                                        <span class="am-icon-trash-o"></span> 删除
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    url:"<?php echo e(route('product_category.sort_order')); ?>",
                    data:data
                });
            })
            //是否显示
            $('.is_something').click(function () {
                var id = $(this).parents('tr').data('id');
                var _this = $(this);
                $.ajax({
                    type:'PATCH',
                    url:'/admin/shop/product_category/is_something',
                    data:{id: id},
                    success:function () {
                        _this.children().toggleClass('am-icon-check am-icon-close');

                    }
                })

            })

            //展开和折叠
            $('.parent').dblclick(function () {
                $(this).toggleClass('am-active');
                $(".child_" + this.id).toggle();
            });
            $('.parents').click(function () {
                $(this).toggleClass('am-active');
                $('.children').toggle();
            })

        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>