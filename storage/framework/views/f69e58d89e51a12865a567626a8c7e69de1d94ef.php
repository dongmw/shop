<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>SHOPING-HOME&商城</title>
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
        <h3>登录</h3>
        <hr>
        <br>
        <form method="post" class="am-form form-horizontal" action="<?php echo e(url('/admin/login')); ?>">
            <?php echo e(csrf_field()); ?>


            <div class="am-form-group<?php echo e($errors->has('name') ? ' am-form-error' : ''); ?> am-form-icon am-form-feedback">
                <?php if($errors->has('name')): ?>
                    <label class="am-form-label" for="doc-ipt-success"><?php echo e($errors->first('name')); ?></label>
                <?php endif; ?>
                
                <input placeholder="请输入用户名：" type="text" id="name" name="name" class="am-form-field" value="<?php echo e(old('name')); ?>" required
                       autofocus>
                <?php if($errors->has('name')): ?>
                    <span class="am-icon-close"></span>
                <?php endif; ?>
            </div>

            <div class="am-form-group<?php echo e($errors->has('password') ? ' am-form-error' : ''); ?> am-form-icon am-form-feedback">
                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <label class="am-form-label" for="doc-ipt-success"><?php echo e($errors->first('password')); ?></label>
                    </span>
                <?php endif; ?>
                
                <input placeholder="请输入用户密码：" type="password" id="password" name="password" class="am-form-field" required>
                <?php if($errors->has('password')): ?>
                    <span class="am-icon-close"></span>
                <?php endif; ?>
            </div>

            <div class="am-form-group<?php echo e($errors->has('captcha') ? ' am-form-error' : ''); ?> am-form-icon am-form-feedback">
                <?php if($errors->has('captcha')): ?>
                    <span class="help-block">
                        <label class="am-form-label" for="doc-ipt-success"><?php echo e($errors->first('captcha')); ?></label>
                    </span>
                <?php endif; ?>
                    
                    <div class="am-g">
                        <div class="am-u-sm-8">
                            <input placeholder="验证码" type="text" id="captcha" name="captcha" class="am-form-field" required>
                        </div>
                        <div class="am-u-sm-4">
                            <img style="cursor: pointer" src="<?php echo e(captcha_src()); ?>" onclick="this.src='<?php echo e(captcha_src()); ?>'+ Math.random();">
                            
                        </div>
                    </div>
            </div>
            <br>
            <label for="remember-me">
                <input id="remember-me" type="checkbox" name="remember">
                记住密码
            </label>
            <br>
            <br>
            <div class="am-cf">
                <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
                <a href="<?php echo e(url('/admin/password/reset')); ?>" class="am-btn am-btn-default am-btn-sm am-fr">
                    忘记密码 ^_^?
                </a>
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



