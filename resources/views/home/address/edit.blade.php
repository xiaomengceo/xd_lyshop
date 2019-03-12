<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>地址管理</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/addstyle.css" rel="stylesheet" type="text/css">
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
	<!-- 引入省市区三级联动js代码 -->
		<script type="text/javascript" src="/home/js/addresss.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

	</head>

	<body>

		
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">修改地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改地址11</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">

									<!-- 表单开始位置 -->

									<form class="am-form am-form-horizontal" action="/home/address/{{ $info->id }}" method="post">
										{{ csrf_field() }}
											{{ method_field('PUT') }}
										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" id="uname" name="uname" value="{{ $info->uname }}" placeholder="收货人">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="phone" name="phone" placeholder="手机号必填" type="text" value="{{ $info->phone }}">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-address" class="am-form-label">设为默认地址</label>
											<div class="am-form-content address">
												<select name="default">
													<option value="0">否</option>
													<option value="1">是</option>
												</select>
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											<div class="am-form-content address">
												<!-- 三级联动菜单的落脚代码 -->
												<select id="cmbProvince" name="cmbProvince" value="{{ old('cmbProvince') }}"></select>  
												<select id="cmbCity" name="cmbCity" value="{{ old('cmbCity') }}"></select>  
												<select id="cmbArea" name="cmbArea" value="{{ old('cmbArea') }}"></select>  
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" id="user-intro" name="detail_addr" placeholder="输入详细地址">{{ $info->detail_addr }}</textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<input class="am-btn am-btn-danger" value="保存 " type="submit">
												<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a>
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>

					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
					</script>

					<div class="clear"></div>

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
							<li> <a href="information.html">个人信息</a></li>
							<li> <a href="safety.html">安全设置</a></li>
							<li class="active"> <a href="address.html">收货地址</a></li>
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
<!-- 	省市区三级联动的实现代码  -->
		<script type="text/javascript">  
		addressInit('cmbProvince', 'cmbCity', 'cmbArea');  


	$("#am-form am-form-horizontal").validate({
		rules:{
			uname:{
				required:true,
				minlength:4,
				maxlength:16
			},
		cmbProvince:{
				required:true,
			},
		
		cmbStreet:{
				required:true,
			},
		
		phone:{
				required:true,
				
			},
		detail_addr:{
				required:true,
			},
			
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			alert('日文歌');
			 
			$(form).ajaxSubmit({
				type: 'post',
				//url: "/home/address" ,
				datatype:'json',
				data:{
                "_token": "{{ csrf_token() }}"       
                
			}, 
			
				success: function(data){
					alert(222222);
					layer.msg('添加成功了!',{icon:1,time:1000});	

				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
                	alert(data.msg);
					layer.msg('error!',{icon:1,time:1000});
				}
			});
			/*var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);*/
		}
	});

	</script>
</html>