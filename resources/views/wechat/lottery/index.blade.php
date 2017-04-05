<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport"
          content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/lottery/css/activity-style.css">

    <style type="text/css">
        body {
            background: url(/lottery/images/bg.png) 0 0 repeat;
        }

        .rotate-content {
            width: 270px;
            position: relative;
            height: 270px;
            background: url(/lottery/images/activity-lottery-bg.png)
            no-repeat 0 0;
            background-size: 100% 100%;
            margin: 0 auto
        }

        .rotate-con-pan {
            background: url(/lottery/images/disk.jpg)
            no-repeat 0 0;
            background-size: 100% 100%;
            position: relative;
            width: 255px;
            height: 255px;
            padding-top: 15px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            margin: 0 auto
        }

        .rotate-con-zhen {
            width: 112px;
            height: 224px;
            background: url(/lottery/images/start.png)
            no-repeat 0 0;
            background-size: 100% 100%;
            margin: 0 auto
        }

    </style>
</head>

<body>

<div class="rotate-content" style="margin-top: 20px">
    <div class="rotate-con-pan">
        <div class="rotate-con-zhen"></div>
    </div>

    <div class="boxcontent boxyellow" style="margin-top: 100px;">
        <div class="box">
            <div class="title-green"><span>奖项设置：</span></div>
            <div class="Detail">
                <p>一等奖：{{$raffle->first}}  </p>
                <p>二等奖：{{$raffle->second}} </p>
                <p>三等奖：{{$raffle->third}}  </p>
            </div>
        </div>
    </div>
    <div class="boxcontent boxyellow">
        <div class="box">
            <div class="title-green">活动说明：</div>
            <div class="Detail">
                <p>本次活动每人可以转 3 次 </p>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="/lottery/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="/lottery/js/jQueryRotate.2.2.js"></script>
<script type="text/javascript" src="/lottery/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="/lottery/js/zp.js"></script>
<script type="text/javascript">

    $(function(){
        $(".rotate-con-zhen").rotate({
            bind:{
                click:function(){
                    var a = runzp();
                    var date = [];
                    date[0] = a.prize;
                    date[1] = a.message;



                    $(this).rotate({
                        duration:3000,
                        angle: 0,
                        animateTo:1440+a.angle,
                        easing: $.easing.easeOutSine,
                        callback: function() {

                            $.post("/lottery/do_lottery",{date:date},function (data) {
                                console.log(data);
                                if (data.status == 0){
                                    alert(data.info)
                                }else{
                                    if (data.status == 1){
                                        alert(data.msg)
                                    }else {
                                        alert(date[0] + date[1]);
                                    }
                                }






                            })


                        }
                    });


                }
            }
        });
    });
</script>
</html>