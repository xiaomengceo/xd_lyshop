<!DOCTYPE html>
<html>

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>安全设置</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/infstyle.css" rel="stylesheet" type="text/css">

					
			<!-- 	验证手机模块 -->
		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/stepstyle.css" rel="stylesheet" type="text/css">

		<script type="text/javascript" src="/home/js/jquery-1.7.2.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<!-- 订单列表模块的css样式 -->
			

			

			<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
			<link href="/home/css/orstyle.css" rel="stylesheet" type="text/css">

			<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		
	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					<div class="am-container header">
						<ul class="message-l">
							<div class="topMessage">
								<div class="menu-hd">
									<a href="#" target="_top" class="h">亲，请登录</a>
									<a href="#" target="_top">免费注册</a>
								</div>
							</div>
						</ul>
						<ul class="message-r">
							<div class="topMessage home">
								<div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
							</div>
							<div class="topMessage my-shangcheng">
								<div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
							</div>
							<div class="topMessage mini-cart">
								<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
							</div>
							<div class="topMessage favorite">
								<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						</ul>
						</div>

						<!--悬浮搜索框-->

						<div class="nav white">
							<div class="logoBig">
								<li><img src="/home/images/logobig.png" /></li>
							</div>

							<div class="search-bar pr">
								<a name="index_none_header_sysc" href="#"></a>
								<form>
									<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
									<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
								</form>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
			</article>
		</header>


		<div class="center">
			<div class="col-main">
				
					@section('content')


					@show


			
				<!--底部-->
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有</em>
						</p>
					</div>
				</div>
			</div>



			<aside class="menu">
				<ul>
					<li class="person">
						<a href="index.html">个人中心</a>
					</li>
					<li class="person">
						<a href="#">个人资料</a>
						<ul>
							<li> <a href="information.html">个人信息</a></li>
							<li> <a href="safety.html">安全设置</a></li>
							<li> <a href="/home/informat">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="order.html">订单管理</a></li>
							<li> <a href="change.html">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的资产</a>
						<ul>
							<li> <a href="coupon.html">优惠券 </a></li>
							<li> <a href="bonus.html">红包</a></li>
							<li> <a href="bill.html">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="collection.html">收藏</a></li>
							<li> <a href="foot.html">足迹</a></li>
							<li> <a href="comment.html">评价</a></li>
							<li> <a href="news.html">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>
		
	</body>

</html>

<script type="text/javascript">
	function sendMobileCode(){
		//alert(111);
	 $.ajax({
	 	dataType:'json',
        url: "/home/safety/send_mail",
        type: 'get',
       
        
        processData: false,
        contentType: false,
        dataType:"json",
      
        success:function(data) {
        	alert(22222);
            if (data.msg == 'success') {
            	alert(data.code);
             
            }
      
        },
        error:function(data){
        	alert(444444);
        	alert(data.code);
        }
    });
	}

	function sendPhone(obj){
		/*接收表单传过来的手机号*/
		var phone = $('#telephone').val();
		/*使用正则区检测是否是正确的手机号*/
		var phone_preg =/^1{1}[3456789]{1}[0-9]{9}$/;
		if(!phone_preg.test(phone)){
			return false;
		};
		/*获取按钮上的文字*/
		var  object = $(obj);
		 var text = object.val();
		  var t = 10;
		  /* 将按钮禁用*/
		object.attr('disabled',true);
		if(text == "点击获取验证码"){
			//alert(11111);
			/*发送ajax请求*/
			 $.get('/home/safety/dosend',{'telephone':phone},function(msg){
			 	//time = null;
			 	/*设置定时器*/
			 	var time =setInterval(function(){
			 	 t--; 
			 //修改按钮的内容
			 	object.val('重新发送验证码('+t+'s)');
			  if(t<1){
				clearInterval(time);
				object.attr('disabled',false);
				object.val('点击获取验证码');
				time = null;
				}	
			}, 1000);
			 			
			
			 	
   		 });

	}else{
		return false;
	}
}
		


</script>
