<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>SHOPPING-HOME&商城</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="alternate icon" type="image/png" href="/vendor/amazeui/i/favicon.png">
    <link rel="stylesheet" href="/vendor/amazeui/css/amazeui.min.css"/>
    <style>
        .header {
            text-align: center;
        }

        .header h1 {
            font-size: 200%;
            color: #333;
            margin-top: 30px;
        }

        .header p {
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="am-g">
        <h1>SHOPING-HOME&商城</h1>
        <p>welcome to here buy buy buy<br/>just do it</p>
    </div>
    <hr/>
</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
        <h3>重置密码</h3>
        <hr>
        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <form method="post" class="am-form form-horizontal" action="<?php echo e(url('/admin/password/email')); ?>">
            <?php echo e(csrf_field()); ?>


            <div class="am-form-group<?php echo e($errors->has('email') ? ' am-form-error' : ''); ?> am-form-icon am-form-feedback">
                <?php if($errors->has('email')): ?>

                        <label class="am-form-label" for="doc-ipt-success"><?php echo e($errors->first('email')); ?></label>

                <?php endif; ?>
                <input placeholder="请输入正确的邮箱地址" type="email" id="email" name="email" class="am-form-field" value="<?php echo e(old('email')); ?>" required
                       autofocus>
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        
                    <span class="am-icon-close"></span>
                    </span>
                <?php endif; ?>
            </div>
            
            

            
            

            
            
            
            
            
            
            


            <br>
            <div class="am-cf">
                <input type="submit" name="" value="发送重置密码链接" class="am-btn am-btn-primary am-btn-sm am-fl">
            </div>
        </form>
        <br>
        <br>
        <hr>
        <p>© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </div>
</div>
</body>
</html>





