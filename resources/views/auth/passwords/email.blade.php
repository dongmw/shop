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
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="post" class="am-form form-horizontal" action="{{ url('/admin/password/email') }}">
            {{ csrf_field() }}

            <div class="am-form-group{{ $errors->has('email') ? ' am-form-error' : '' }} am-form-icon am-form-feedback">
                @if ($errors->has('email'))

                        <label class="am-form-label" for="doc-ipt-success">{{ $errors->first('email') }}</label>

                @endif
                <input placeholder="请输入正确的邮箱地址" type="email" id="email" name="email" class="am-form-field" value="{{ old('email') }}" required
                       autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                    <span class="am-icon-close"></span>
                    </span>
                @endif
            </div>
            {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

            {{--<div class="col-md-6">--}}
            {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

            {{--@if ($errors->has('email'))--}}
            {{--<span class="help-block">--}}
            {{--<strong>{{ $errors->first('email') }}</strong>--}}
            {{--</span>--}}
            {{--@endif--}}
            {{--</div>--}}
            {{--</div>--}}


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





