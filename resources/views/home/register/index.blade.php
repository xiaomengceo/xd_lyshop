<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/home/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/home/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="/home/images/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/home/images/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">邮箱注册</a></li>
								<li><a href="">手机号注册</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-active">
									<form method="post" action="/home/register/by_email" id="form_email">
									{{ csrf_field() }}
							   <div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="email" name="email" id="email" placeholder="请输入邮箱账号">
                 </div>										
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="password" id="password" placeholder="设置密码">
                 </div>										
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="password2" id="passwordRepeat" placeholder="确认密码">
                 </div>	
                 
                 </form>
                 
								 <div class="login-links">
										<label for="reader-me">
											<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
										</label>
							  	</div>
										<div class="am-cf">
											<input  id="by_email" type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>

								</div>

								<div class="am-tab-panel">
									<form method="post" action="/home/register/by_phone" id="form_phone">
									{{ csrf_field() }}
								 <div class="user-phone">
								    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
								    <input type="tel" name="phone" id="phone" placeholder="请输入手机号">
                 </div>																			
										<div class="verification">
											<label for="code"><i class="am-icon-code-fork"></i></label>
											<input type="tel" name="code" id="code" placeholder="请输入验证码">
											<a class="btn" href="javascript:void(0);" onClick="sendMobileCode(this);" id="sendMobileCode">
												<span id="dyMobileButton">获取</span>	 </a>
											
										</div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="password" id="password" placeholder="设置密码">
                 </div>										
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="passwordRepeat" id="passwordRepeat" placeholder="确认密码">
                 </div>	
									</form>
								 <div class="login-links">
										<label for="reader-me">
											<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
										</label>
							  	</div>
										<div class="am-cf">
											<input id="by_phone" type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>
								
									<hr>
								</div>

								<script>
									$(function() {
									    $('#doc-my-tabs').tabs();
									  })
								</script>

							</div>
						</div>

				</div>
			</div>
			
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有</em>
							</p>
						</div>
					</div>
	</body>

</html>
 <script type="text/javascript">
    
		 //邮箱注册提交
		$('#by_email').click(function(){
       //表单验证
			 //提交emai表单
			 //alert(666);
			 $('#form_email').submit(); 
		});
     //手机号注册提交
		$("#by_phone").click(function(){
        //表单验证
  
				//提交phone表单
				$('#form_phone').submit(); 
    });
	 
		//验证码倒计时
		function editCon()
		{
			var t = 60;
			var time = null;
			if(time == null){
				time = setInterval(function(){
					t--;
					// 修改当前button 和 内容
					$('#dyMobileButton').text('重发('+t+'s)');
					 
					if(t < 1){
						// 清除定时器
						clearInterval(time);
						time = null;
						$('#dyMobileButton').text('获取');
						// 设置button状态
						$('#sendMobileCode').attr('onclick','sendMobileCode(this)');
					}
				},1000);
			}			
		}
    //发送验证码
		function sendMobileCode(obj)
		{
			// 接收手机号码
			var phone = $('#phone').val();
			// 定义正则检查手机号是否格式正确
			var phone_grep = /^1{1}[3456789]{1}[0-9]{9}$/;
			// 使用正则检查手机号
			if(!phone_grep.test(phone)){
				return false;
			}
			// 将js对象转化成jquery对象
			var object = $(obj);
		 
		  //去掉a标签按钮中的onclick事件
			object.removeAttr('onclick');
			// 获取当前的按钮上的文字
			var text = $('#dyMobileButton').text();
			if(text == '获取'){
				// 发送ajax 请求后台 
				$.get('/home/register/send_phone/'+phone ,function(data){
					if(data.code == 0){
						editCon();
					}else{
						alert(data.msg);
					}
				},'json');	
			}else{
				return false;
			}
			
		}

	 

 </script>