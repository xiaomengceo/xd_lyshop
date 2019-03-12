<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/lib/html5shiv.js"></script>
<script type="text/javascript" src="/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>新增文章分类 - 分类管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
	<center><font style="font-size: 25px;color:green">添加链接</font></center>
		<center><img src="" id="img-thumbnail" style="width:80px;height:80px"> </center>
<article class="page-container">
	<form  action="/admin/friend_links" method="post" id="form-admin-add1" class="form form-horizontal" enctype="multipart/form-data" >
		{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">链接名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="links_name" name="links_name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>链接路径：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="path" name="path">
			</div>
		</div>

			 

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">链接logo：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="file" onchange="upload1()" class="input-text" value="" placeholder="" id="logo" name="logo">
				 <input type="hidden" name="logo-hid" id="form-admin-upload" value="">
		</div>
			</div>
		</div>

		
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>显示状态：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select class="select" name="display" size="1">
					<option value="0">显示</option>
					<option value="1">隐藏</option>
					
				</select>			
			</div>
		</div>
		

		
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input  class="btn btn-primary radius" type="submit" value="添加">
		
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/admin/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/admin/lib/ueditor/1.4.3/ueditor.config.js"></script> 
<script type="text/javascript" src="/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script> 
<script type="text/javascript" src="/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	//表单验证
	$("#form-admin-add1").validate({
		rules:{
			links_name:{
				required:true,
			},
			path:{
				required:true,
			},
		
			display:{
				required:true,
			},
			logo:{
				required:true,
			},
				
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			 
			$(form).ajaxSubmit({
				type: 'post',
			//把url删除可以解决提交失败的状态码500
				datatype:'json',
				data:{
                "_token": "{{ csrf_token() }}"       
                	
				}, 
			
			success: function(data){
					alert(222222);
					layer.msg('添加成功了!',{icon:1,time:1000});	
				
				},
                error: function(data,XmlHttpRequest, textStatus, errorThrown){
                	alert(data.st);
					layer.msg('error!',{icon:1,time:1000});
				}
			});
			/*var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);*/
		}
	});
});


	

function upload1(){
	//alert(88888);
		 $.ajax({
        url: "/admin/friend_links/upload1",
        type: 'POST',
       
        data: new FormData($('#form-admin-add1')[0]),
        processData: false,
        contentType: false,
        dataType:"json",
      
        success:function(data) {
        	alert(111111);
            if (data.msg == 'success') {
            	//console.log(data);
                $("#img-thumbnail").attr("src", "/uploads/"+ data.path);
           		/*   $("#form-admin-add1").val(data.path);*/
           		   $("#form-admin-upload").val(data.path);
           		   console.log($("#form-admin-upload").val());
            }
      
        },
        error:function(data){
        	alert(data.msg);
        }
    });

}
/*实例化编辑器*/

	var ue = UE.getEditor('editor');

</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>