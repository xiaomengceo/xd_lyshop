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
<title>物流管理 - 修改物流信息 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
	1111111111111
	<center><h3 style="color:green">编辑物流信息</h3></center>
	<center><img src="/app/{{ $info->logo }}" id="img-thumbnail" style="width:100px;height:100px"></center>
<article class="page-container">
	<form class="form form-horizontal" action="/admin/expr_manages" id="form-admin-add"   method="post"  enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>物流名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{ $info->name }}" placeholder="" id="name" name="name">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>品牌Logo：</label>
		<div class="formControls col-xs-8 col-sm-9">
			
			<input type="file" onchange="upload()"  value="" placeholder="请添加图片" id="form-admin-adds" name="logo">
			 <input type="hidden" name="brand-logo" id="form-admin-upload" value="">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>物流编号：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off"  placeholder="请填写网址" id="expr_code" name="expr_code" value="{{ $info->expr_code }}">
		</div>
	</div>
	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否显示：</label>
		<div class="formControls col-xs-8 col-sm-9">
				<select name="status" style="width:100px;height:31px;float:left">
					<option value="0">禁用</option>
					<option value="1">显示</option>
				</select>
		</div>
	</div>
	
	
 	 <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">品牌描述：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="descr" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" >{{ $info->descr }}</textarea>
			<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
		</div>
	</div>  
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
			brandsName:{
				required:true,
				minlength:4,
				maxlength:16
			},
		logo:{
				required:true,
			},
		
		
		url:{
				required:true,
				
			},
		descr:{
				required:true,
			},
			
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			/*$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });*/
			$(form).ajaxSubmit({
				type: 'post',
				url:'/admin/expr_manages/{{ $info->id}}',
				data:{
                "_token": "{{ csrf_token() }}"       
                
			}, 
				success: function(data){
					alert(222222);
					layer.msg('修改成功了!',{icon:1,time:1000});	
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
	var formData = new FormData();
	formData.append('logo', $('#form-admin-adds')[0].files[0]);
	formData.append('_token', '{{ csrf_token() }}');
	 $.ajax({
        url: "/admin/expr_manages/upload",
        type: 'POST',
       
        data: formData,
        processData: false,
        contentType: false,
        dataType:"json",
      
        success:function(data) {
        	alert(111111);
            if (data.msg == 'success') {
            	console.log(data);
                $("#img-thumbnail").attr("src", "/uploads/"+ data.path);
           		/*   $("#form-admin-add").val(data.path);*/
           		   $("#form-admin-upload").val(data.path);
           		   console.log($("#form-admin-upload").val());
            }
      
        },
        error:function(data){
        	alert(11111111);
        }
    });

}




/*实例化编辑器*/

	var ue = UE.getEditor('editor');

</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>