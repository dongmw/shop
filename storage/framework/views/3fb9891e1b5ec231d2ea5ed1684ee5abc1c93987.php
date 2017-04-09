<?php $__env->startSection('content'); ?>

    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">广告分类</strong> /
                    <small>AD CATEGORY MANAGE</small>
                </div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a href="<?php echo e(Route('ad_category.create')); ?>" class="am-btn am-btn-default"><span
                                        class="am-icon-plus"></span> 新增
                            </a>
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
                                <th class="table-category">分类名</th>
                                <th class="table-sort_order">排序</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $ad_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id="<?php echo e($category->id); ?>" id="<?php echo e($category->id); ?>" class="parent">
                                    <td class="table-id"><?php echo e($category->id); ?></td>
                                    <td class="table-thumb">
                                        <img src="<?php echo e($category->thumb); ?>" alt="" style="height: 60px">
                                    </td>
                                    <td class="table-category"><?php echo e($category->name); ?></td>
                                    <td class="table-sort_order">
                                        <input type="text" value="<?php echo e($category->sort_order); ?>"
                                               class="am-input-sm sort_order">
                                    </td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href=""
                                                   class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                            class="am-icon-pencil-square-o"></span> 编辑
                                                </a>
                                                <a href="" data-method="delete"
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