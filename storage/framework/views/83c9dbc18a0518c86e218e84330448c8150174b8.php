<?php if(session('notice')): ?>
    <div class="am-g">
        <div class="am-u-md-12">
            <div class="am-alert am-alert-success">
                <?php echo e(session('notice')); ?>

            </div>
        </div>
    </div>
<?php endif; ?>

<?php if(session('alert')): ?>
    <div class="am-g">
        <div class="am-u-md-12">
            <div class="am-alert am-alert-danger">
                <?php echo e(session('alert')); ?>

            </div>
        </div>
    </div>
<?php endif; ?>

<?php if(count($errors) > 0): ?>
    <div class="am-g">
        <div class="am-u-md-12">
            <div class="am-alert am-alert-danger">
                <h2>Oops~ There's something wrong!</h2>
                <ol>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            </div>
        </div>
    </div>
<?php endif; ?>