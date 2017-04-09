<?php $__env->startSection('content'); ?>
    <div class="page-list" data-log="商品列表">
        <!--
        <div class="header">
            <div class="left">
                <a class="home"><img src="http://s1.mi.com/m/images/m/icon_back_n.png" class="ib"></a>
            </div>
            <div class="tit"><h2 data-log="HEAD-标题-商品列表"><span class="title">商品列表</span></h2></div>

            <div class="right">
                <a href="/1/#/search/index">
                    <div class="icon icon-search"></div>
                </a>
            </div>
        </div>
        -->
        <ol class="version">
            <?php $__currentLoopData = $categories->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="version-item" onclick="location.href='/product/<?php echo e($product->id); ?>'">

                        <div class="version-item-img"><img
                                    src="<?php echo e($product->thumb); ?>?width=150&amp;height=150">
                        </div>
                        <div class="version-item-intro">
                            <div class="version-item-name"><p><?php echo e($product->name); ?></p></div>
                            <div class="version-item-intro-price"><span><?php echo e($product->price); ?>元</span></div>
                        </div>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
        

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wechat.layout.__footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('wechat.layout.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>