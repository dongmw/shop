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
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">广告列表</strong> /
                    <small>AD LIST</small>
                </div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a href="<?php echo e(Route('ad.create')); ?>" class="am-btn am-btn-default"><span
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
                                <th class="table-name">标题</th>
                                <th class="table-category">所属分类</th>
                                <th class="table-desc">描述</th>
                                <th class="table-sort_order">排序</th>
                                <th class="table-time">上架日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id="<?php echo e($ad->id); ?>" id="row_<?php echo e($ad->id); ?>" class="parent">
                                    <td class="checkbox">
                                        <input type="checkbox" id=" checked">
                                    </td>
                                    <td class="table-id"><?php echo e($ad->id); ?></td>
                                    <td class="table-thumb"><img src="<?php echo e($ad->thumb); ?>" style="height: 60px;" alt=""></td>
                                    <td class="table-name">
                                        <a target="_blank" href="<?php echo e($ad->url); ?>"><?php echo e($ad->name); ?></a>
                                    </td>
                                    <td class="table-category"><?php echo e($ad->AdCategory->name); ?></td>
                                    <td class="table-desc"><?php echo e($ad->desc); ?></td>
                                    <td class="table-sort_order">
                                        <input type="text" value="<?php echo e($ad->sort_order); ?>" style="width: 60px">
                                    </td>
                                    <td class="table-time"><?php echo e($ad->created_at); ?></td>
                                    <td class="table-set">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href="<?php echo e(route('ad.edit',$ad->id)); ?>"
                                                   class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                            class="am-icon-pencil-square-o"></span> 编辑
                                                </a>
                                                <a href="<?php echo e(route('ad.destroy', $ad->id)); ?>" data-method="delete"
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="assets/js/amazeui.ie8polyfill.min.js"></script>

    <script src="/vendor/daterangepicker/moment.js"></script>
    <script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/js/daterange_config.js"></script>

    <script src="assets/js/amazeui.min.js"></script>
    <script src="assets/js/app.js"></script>
    
        
            
                
                
                    
                    
                

                
                    
                    
                    
                    
                        
                    
                
            

        
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>