

<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
        <ul class="am-list admin-sidebar-list">
            <li><a href="/admin"><span class="am-icon-home"></span> 首页</a></li>
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-shopping-bag"></span> 商品管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
                    <li><a href="{{route('brands.index')}}" class="am-cf"><span class="am-icon-apple"></span> 品牌管理<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                    <li><a href="{{route('product_category.index')}}"><span class="am-icon-th"></span> 商品分类</a></li>
                    <li><a href="{{route('product.index')}}"><span class="am-icon-th-list"></span> 商品列表<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                    <li><a href="{{route('product.create')}}"><span class="am-icon-cart-plus"></span> 添加新商品</a></li>
                    <li><a href="{{route('product.recycle')}}"><span class="am-icon-bug"></span> 回收站</a></li>
                </ul>
            </li>
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-ad'}"><span class="am-icon-tags"></span> 广告中心<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-ad">
                    <li><a href="{{route('ad.index')}}" class="am-cf"><span class="am-icon-tasks"></span> 广告列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                    <li><a href="{{route('ad.create')}}"><span class="am-icon-plus-square-o"></span> 添加新广告</a></li>
                    <li><a href="{{route('ad_category.index')}}"><span class="am-icon-th-large"></span> 广告分类<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                    <li><a href=""><span class="am-icon-trash"></span> 广告回收站</a></li>
                </ul>
            </li>
            <li><a href="{{route('system.member')}}"><span class="am-icon-child"></span> 会员中心</a></li>
            <li><a href="admin-form.html"><span class="am-icon-list-alt"></span> 订单管理</a></li>
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-system'}"><span class="am-icon-cog"></span> 系统设置 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-system">
                    <li><a href="/admin/system/config" class="am-cf"><span class="am-icon-info-circle"></span> 站点信息</a></li>
                    <li><a href="/admin/system/password"><span class="am-icon-certificate"></span> 修改密码</a></li>
                </ul>
            </li>
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-weichat'}"><span class="am-icon-weixin"></span> 微信管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-weichat">
                    <li><a href="{{route('wechat.edit')}}" class="am-cf"><span class="am-icon-info-circle"></span> 微信菜单</a></li>
                    <li><a href="{{route('wechat.index')}}"><span class="am-icon-certificate"></span> 中奖信息</a></li>
                </ul>
            </li>

        </ul>

        <div class="am-panel am-panel-default admin-sidebar-panel">
            <div class="am-panel-bd">
                <p><span class="am-icon-bookmark"></span> 公告</p>
                <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
            </div>
        </div>

        <div class="am-panel am-panel-default admin-sidebar-panel">
            <div class="am-panel-bd">
                <p><span class="am-icon-tag"></span> wiki</p>
                <p>Welcome to the Amaze UI wiki!</p>
            </div>
        </div>
    </div>
</div>