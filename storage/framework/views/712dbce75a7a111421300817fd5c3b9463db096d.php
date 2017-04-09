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

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">会员管理</strong> /
                <small>Customer Manage</small>
            </div>
        </div>

        <?php echo $__env->make('layouts.admin._flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">
                <form class="am-form-inline" role="form" method="get">

                    <div class="am-form-group">
                        <input type="text" name="nickname" class="am-form-field am-input-sm" placeholder="会员昵称"
                               value="<?php echo e(Request::input('nickname')); ?>">
                    </div>

                    <div class="am-form-group">
                        <input type="text" name="openid" class="am-form-field am-input-sm" placeholder="微信OPEN_ID"
                               value="<?php echo e(Request::input('openid')); ?>">
                    </div>

                    <div class="am-form-group">
                        <select data-am-selected="{btnSize: 'sm'}" name="sex" id="">
                            <option value="-1" <?php if(Request::input('sex') == '-1'): ?> selected <?php endif; ?>>选择性别</option>
                            <option value="1" <?php if(Request::input('sex') == '1'): ?> selected <?php endif; ?>>男</option>
                            <option value="0" <?php if(Request::input('sex') == '0'): ?> selected <?php endif; ?>>女</option>
                        </select>
                    </div>

                    <div class="am-form-group">
                        <input type="text" id="created_at" placeholder="选择注册时间" name="created_at"
                               value="<?php echo e(Request::input('created_at')); ?>" class="am-form-field am-input-sm"/>
                    </div>

                    <button type="submit" class="am-btn am-btn-default am-btn-sm">查询</button>
                </form>
            </div>

        </div>


        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>头像</th>
                            <th>昵称</th>
                            <th>openid</th>
                            <th>性别</th>
                            <th class="am-hide-sm-only">关注时间</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($customer->id); ?></td>
                                <td><img src="<?php echo e($customer->headimgurl); ?>" alt="" class="thumb"/></td>
                                <td><?php echo e($customer->nickname); ?></td>
                                <td><?php echo e($customer->openid); ?></td>

                                <td class="am-hide-sm-only">
                                    <?php if($customer->sex == 1): ?>
                                        <span class="am-icon-male"></span>
                                    <?php else: ?>
                                        <span class="am-icon-female"></span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($customer->created_at); ?></td>

                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a class="am-btn am-btn-default am-btn-xs am-text-secondary" href="/shop/order?customer_id=<?php echo e($customer->id); ?>">
                                                <span class="am-icon-list-alt"></span> 查看订单
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>

                    共 条记录

                    <div class="am-cf">
                        <div class="am-fr">

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="/vendor/daterangepicker/moment.js"></script>
    <script src="/vendor/moment/locale/zh-cn.js"></script>
    <script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/js/daterange_config.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>