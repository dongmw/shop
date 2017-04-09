<?php $__env->startSection('content'); ?>
    <div class="page-category" data-log="商品分类">

        <div class="page-category-wrap">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="list-wrap" id="m0">
                    <h3 class="list_title"><?php echo e($category->name); ?></h3>
                    <ol class="list_category">
                        <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li onclick="location.href='/product?category_id=<?php echo e($child->id); ?>'">
                                <div class="img"><img src="<?php echo e($child->thumb); ?>"></div>
                                <div class="name"><span><?php echo e($child->name); ?></span></div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wechat.layout.__footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('wechat.layout.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>