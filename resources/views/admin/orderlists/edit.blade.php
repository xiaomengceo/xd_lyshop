<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
 <meta name="csrf-token" content="{{ csrf_token() }}">
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>订单管理 - 修改订单 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
	水电工如何如何
	<center><h3 style="color:green">修改订单</h3></center>
	
<article class="page-container">
	<form class="form form-horizontal" action="/admin/order_list/{{ $info->id }}" id="form-admin-add"   method="post">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{ $info->uid }}" placeholder="" id="uid" name="uid">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>收货地址：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{ $info->aid }}" placeholder="" id="aid" name="aid">
		</div>
	</div>




	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>订单编号：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off"  placeholder="请填写网址" id="order_code" name="order_code" value="{{ $info->order_code }}">
		</div>
	</div>


<!-- 	<div class="row cl">
	<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>购买数量：</label>
	<div class="formControls col-xs-8 col-sm-9 skin-minimal">
		<select name="nums" style="width:100px;height:31px;float:left">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
			</select>
	</div>
</div> -->


	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商品操作：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<select name="nums" style="width:100px;height:31px;float:left">
					<option value="0">---默认---</option>
					<option value="1">退货</option>
					<option value="2">退款</option>
				
			</select>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>订单状态：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<select name="order_status" style="width:100px;height:31px;float:left">
					<option value="0">请选择</option>
					<option value="1">等待付款</option>
					<option value="2">已付款</option>
					<option value="3">等待发货</option>
					<option value="4">已发货</option>
					<option value="5">已确认收货</option>
					<option value="6">未评价</option>
					<option value="7">交易完成</option>
				</select>	
				
		</div>
	</div>
	 <!-- 	<div class="row cl">
	 			<label class="form-label col-xs-4 col-sm-2">品牌描述：</label><br>
	 			<div class="formControls col-xs-8 col-sm-9" style="align:right" name="descr"> 
	 				<script id="editor" name="content" type="text/plain" style="width:900px;height:200px;"></script> 
	 			</div>
	 		</div>  -->
	
 	 <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">买家留言：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="buyer_mess" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" > {{$info->buyer_mess}}</textarea>
			<p class="textarea-numberbar"><em class="textarea-length">0</em>/50</p>
		</div>
	</div>  
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" style="width:100px" type="submit" value="&nbsp;&nbsp;提&nbsp;&nbsp&nbsp;&nbsp交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/ueditor/1.4.3/ueditor.config.js"></script> 
<script type="text/javascript" src="/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
			uid:{
				required:true,
				number:true,
				
			},
		order_code:{
				required:true,
			},
		
		
		order_status:{
				required:true,
				
			},
		price:{
				required:true,
				number:true,
			},
		price:{
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
				url: "/admin/order_list/{{ $info->id }}" ,
				datatype:'json',
				data:{
                "_token": "{{ csrf_token() }}"       
                
			}, 
			
				success: function(data){
					alert(222222);
					layer.msg('修改成功了哈哈!',{icon:1,time:1000});	

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

function upload(){
	//alert(111111888888);
	 $.ajax({
        url: "/admin/order_list/upload",
        type: 'POST',
       
        data: new FormData($('#form-admin-add')[0]),
        processData: false,
        contentType: false,
        dataType:"json",
      
        success:function(data) {
        	alert(111111);
            if (data.msg == 'success') {
            	//console.log(data);
                $("#img-thumbnail").attr("src", "/app/"+ data.path);
           		/*   $("#form-admin-add").val(data.path);*/
           		   $("#form-admin-upload").val(data.path);
           		   //给input hidden 的表单赋值
           		   console.log($("#form-admin-upload").val());
            }
      
        },
        error:function(data){
        	alert(55555);
        }
    });

}
/*实例化编辑器*/

	var ue = UE.getEditor('editor');

</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>