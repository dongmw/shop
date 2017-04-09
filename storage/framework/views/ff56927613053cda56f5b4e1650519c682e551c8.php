<?php $__env->startSection('content'); ?>
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">编辑分类</strong> /
                <small>Edit The Category</small>
            </div>
        </div>

        <?php echo $__env->make('layouts.admin._flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">

                <div class="am-tab-panel">
                    <form class="am-form" action="<?php echo e(route('product_category.update',$category->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <?php echo e(method_field('put')); ?>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                上级分类
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <select name="parent_id" id="parent_id" data-am-selected="{btnWidth: '100%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}">

                                    <option value="0">顶级分类</option>

                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option  value="<?php echo e($c->id); ?>" <?php if($category->parent_id == $c->id): ?> selected <?php endif; ?>><?php echo e($c->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>


                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                分类名称
                            </div>
                            <div class="am-u-sm-8 am-u-md-4">
                                <input type="text" class="am-input-sm" name="name" value="<?php echo e($category->name); ?>">
                            </div>
                            <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
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
                                <textarea rows="4" name="desc"><?php echo e($category->desc); ?></textarea>
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                显示导航栏
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <label class="am-radio-inline">
                                    <input type="radio" value="1" name="is_show" checked> 是
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" value="0" name="is_show"> 否
                                </label>
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                排序
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input type="text" name="sort_order" class="am-input-sm" value="<?php echo e($category->sort_order); ?>">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="/js/jquery.html5-fileupload.js"></script>
    <script src="/js/upload.js"></script>
    <script src="/vendor/ckfinder/ckfinder.js"></script>
    <script src="/js/ck_upload.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>