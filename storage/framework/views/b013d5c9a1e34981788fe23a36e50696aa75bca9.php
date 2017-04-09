<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-index" id="home" data-log="首页">
        <div class="index-header">
            <div class="search_bar">
                <a href="/1/#/search/index">
                    <span class="icon icon-search"></span>
                    <span class="text">搜索商品名称</span>
                </a>
            </div>
            <div class="search_bottom"></div>
        </div>

        <!--焦点图-->
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <?php $__currentLoopData = $index_ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index_ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href=""><img src="<?php echo e($index_ad->thumb); ?>"/></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </section>

        <!--推荐商品-->
        <div class="list">
            <div class="section">
                <div class="mcells_auto_fill">
                    <div class="body">
                        <?php $__currentLoopData = $banner_ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner_ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <div class="items">
                                    <img src="<?php echo e($banner_ad->thumb); ?>">
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="section">
                    <div>
                        <div class="item">
                            <div class="img">
                                <img class="ico" src="<?php echo e($product->thumb); ?>">
                                <img class="tag " src="http://c1.mifile.cn/f/i/f/mishop/iic/xp.png">
                            </div>
                            <div class="info">
                                <div class="name"><p><?php echo e($product->name); ?></p></div>
                                <div class="brief"><p><?php echo e($product->desc); ?></p></div>
                                <div class="price"><p><?php echo e($product->price); ?>元 起</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script defer src="wechat/flexslider/jquery.flexslider.js"></script>
    <script type="text/javascript">
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                directionNav: false
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('wechat.layout.__footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('wechat.layout.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>