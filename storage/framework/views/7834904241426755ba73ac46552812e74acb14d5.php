<?php $__env->startSection('content'); ?>
    <div class="page-address-list" data-log="地址列表">
        <div class="address-choose">
            <ul class="ui-list">
                <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="ui-list-item" data-id="<?php echo e($a->id); ?>">
                        <p class="ui_fz30">
                            <span class="consignee"><?php echo e($a->name); ?></span>
                            <span><?php echo e($a->tel); ?></span>
                        </p>
                        <p><?php echo e($a->province); ?> <?php echo e($a->city); ?> <?php echo e($a->area); ?></p>
                        <p><?php echo e($a->detail); ?></p>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
        </div>
        <div class="add">
            <a href="/address/create" class="ui-button ui-button-active">
                <span>新建地址</span>
            </a>
        </div>
        <div class="popup-risk-check"></div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(function () {
            $("li").click(function () {
                var address_id = $(this).data("id");
                $.ajax({
                    type: "PATCH",
                    url: "",
                    data: {address_id: address_id},
                    success: function (data) {
//                        console.log(data);
                        location.href = '/order/checkout';
                    }
                })
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wechat.layout.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>