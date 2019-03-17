<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>个人资料</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/infstyle.css" rel="stylesheet" type="text/css">
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
			
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
            <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>
	<!--头像 -->
						<form id="am-form am-form-horizontal" action="/home/informat/{{ $info->id }}"    method="post"  enctype="multipart/form-data">
							{{ csrf_field() }}
                            {{ method_field('PUT') }}	
							<div class="user-infoPic">

							<div class="filePic">
								<input type="file" class="inputPic" onchange="upload()" name="users_pic" id="user_pic"  value="">
								<img class="am-circle am-img-thumbnail" id="image" src="/uploads/{{ $info->users_pic }}" alt="我的头像" />
								 
							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i>小叮当</i></b></div>
								<div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="#">铜牌会员</a>
						            </span>
								</div>
								<div class="u-safety">
									<a href="safety.html">
									 账户安全
									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>
									</a>
								</div>
							</div>
						</div>

						<!--个人信息 -->
						<div class="info-main">
							<form class="am-form am-form-horizontal">
									
								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" name="user_name" value="{{ $info->user_name }}" placeholder="nickname">

									</div>
								</div>

							<div class="am-form-group">
									<label for="user-name" class="am-form-label">密码</label>
									<div class="am-form-content">
										<input type="password" name="password"  placeholder="password">

									</div>
								</div>

									<input type="hidden" name="urs_pic" id="form-admin-upload" value="">
								

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">真实姓名</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" name="real_name" placeholder="name" value="{{ $info->real_name }}">

									</div>
								</div>

									<div class="am-form-group">
									<label for="user-name" class="am-form-label">邮箱</label>
									<div class="am-form-content">
										<input type="email" name="email"  placeholder="email">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="0"  
										</label>女
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="1" 
					                       data-am-ucheck> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="2" ?  data-am-ucheck> 保密
										</label>
									</div>
								</div>

								
								<div class="am-form-group">
									<label for="user-birth" class="am-form-label">生日</label>
									<div class="am-form-content birth">
										<div class="birth-select">
											<select name="year1"><option value="0">-请选择年份-</option><option value="2024">2024年</option><option value="2023">2023年</option><option value="2022">2022年</option><option value="2021">2021年</option><option value="2020">2020年</option><option value="2019">2019年</option><option value="2018">2018年</option><option value="2017">2017年</option><option value="2016">2016年</option><option value="2015">2015年</option><option value="2014">2014年</option><option value="2013">2013年</option><option value="2012">2012年</option><option value="2011">2011年</option><option value="2010">2010年</option><option value="2009">2009年</option><option value="2008">2008年</option><option value="2007">2007年</option><option value="2006">2006年</option><option value="2005">2005年</option><option value="2004">2004年</option><option value="2003">2003年</option><option value="2002">2002年</option><option value="2001">2001年</option><option value="2000">2000年</option><option value="1999">1999年</option><option value="1998">1998年</option><option value="1997">1997年</option><option value="1996">1996年</option><option value="1995">1995年</option><option value="1994">1994年</option><option value="1993">1993年</option><option value="1992">1992年</option><option value="1991">1991年</option><option value="1990">1990年</option><option value="1989">1989年</option><option value="1988">1988年</option><option value="1987">1987年</option><option value="1986">1986年</option><option value="1985">1985年</option><option value="1984">1984年</option><option value="1983">1983年</option><option value="1982">1982年</option><option value="1981">1981年</option><option value="1980">1980年</option><option value="1979">1979年</option><option value="1978">1978年</option><option value="1977">1977年</option><option value="1976">1976年</option><option value="1975">1975年</option><option value="1974">1974年</option><option value="1973">1973年</option><option value="1972">1972年</option><option value="1971">1971年</option><option value="1970">1970年</option></select>

											<em>年</em>
										</div>
										<div class="birth-select2">
											<select name="month1"><option value="0">-请选择月份-</option><option value="1">1月</option><option value="2">2月</option><option value="3">3月</option><option value="4">4月</option><option value="5">5月</option><option value="6">6月</option><option value="7">7月</option><option value="8">8月</option><option value="9">9月</option><option value="10">10月</option><option value="11">11月</option><option value="12">12月</option></select>

											<em>月</em></div>
										<div class="birth-select2">
											<select name="day1"><option value="0">-请选择日期-</option><option value="1">1日</option><option value="2">2日</option><option value="3">3日</option><option value="4">4日</option><option value="5">5日</option><option value="6">6日</option><option value="7">7日</option><option value="8">8日</option><option value="9">9日</option><option value="10">10日</option><option value="11">11日</option><option value="12">12日</option><option value="13">13日</option><option value="14">14日</option><option value="15">15日</option><option value="16">16日</option><option value="17">17日</option><option value="18">18日</option><option value="19">19日</option><option value="20">20日</option><option value="21">21日</option><option value="22">22日</option><option value="23">23日</option><option value="24">24日</option><option value="25">25日</option><option value="26">26日</option><option value="27">27日</option><option value="28">28日</option><option value="29">29日</option><option value="30">30日</option><option value="31">31日</option></select>

											<em>日</em></div>
									</div>
							
								</div>

								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" placeholder="telephonenumber" name="telephone" value="{{ $info->telephone }}" type="tel">

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-email" class="am-form-label">婚姻状况</label>
									<div class="am-form-content">
										<select name="marital_status">
											<option value="0" {{ $info->marital_status }}== 0? 'selected':''  >未婚</option>
											<option value="{{ $info->marital_status  }}" {{ $info->marital_status }}==1? 'selected':''>已婚</option>
	                                      	<option value="{{ $info->marital_status}}" {{ $info->marital_status }}==2? selected:''>离异</option>		
										</select>

									</div>
								</div>
							
								<div class="info-btn">
									<input class="am-btn am-btn-danger" type="submit" value="提交资料">
								</div>

							</form>
						</div>

					</div>

				</div>
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
							<li class="active"> <a href="information.html">个人信息</a></li>
							<li> <a href="safety.html">安全设置</a></li>
							<li> <a href="address.html">收货地址</a></li>
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
		
//post提交
$(function(){
/*	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});*/
	
	$("#am-form am-form-horizontal").validate({
		rules:{
			user_name:{
				required:true,
				minlength:4,
				maxlength:16
			},
			real_name:{
				required:true,
				minlength:4,
				maxlength:16
			},

		sex:{
				required:true,
			},

		marital_status:{
				required:true,
			},
		birthday:{
				required:true,
			},
		
		users_pic:{
				required:true,
				
			},
		telephone:{
				required:true,
				number:true,
			},
			
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			//alert(111111111);
			 
			$(form).ajaxSubmit({
				type: 'post',
				url: "/home/informat/" ,
				datatype:'json',
				data:{
                "_token": "{{ csrf_token() }}"       
                
			}, 



			
				success: function(data){
					alert(222222);
					layer.msg('添加成功了!',{icon:1,time:1000});	

				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
                	alert(11111);
					layer.msg('error!',{icon:1,time:1000});
				}
			});
			/*var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);*/
		}
	});
});	


/*上传文件的方法*/
function upload(){
	alert(111111888888);
	/* $.ajax({
        url: "/home/informat/upload",
        type: 'POST',
       data:{
                "_token": "{{ csrf_token() }}"       
                
			}, 
        data: new FormData($('#am-form am-form-horizontal')[0]),*/

         var formData = new FormData();
		formData.append('users_pic', $('#user_pic')[0].files[0]);
				
		formData.append('_token', '{{ csrf_token() }}');
		 $.ajax({
        url: "/home/informat/upload",
        type: 'POST',
       
        data: formData,
        processData: false,
        contentType: false,
        dataType:"json",
      
        success:function(data) {
        	alert('111111zzzzzz');
            if (data.msg == 'success') {
            	//console.log(data);
                $("#image").attr("src", "/uploads/"+ data.path);
           		/*   $("#am-form am-form-horizontal").val(data.path);*/
           		   $("#form-admin-upload").val(data.path);
           		   //给input hidden 的表单赋值
           		   console.log(data.path);
            }
      
        },
        error:function(data){
        	alert(55555);
        }
    });

}
</script>