<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/admin/favicon.ico" >
<link rel="Shortcut Icon" href="/admin/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>添加品牌</title>
</head>
<body>
<div class="page-container">
	<form enctype="multipart/form-data" action="/admin/brand" method="post" class="form form-horizontal" id="form-category-add">
	{{ csrf_field() }}
		<div id="tab-category" class="HuiTab">
			<div class="tabBar cl">
				<span>添加品牌</span>
				<!-- <span>模版设置</span>
				<span>SEO</span> -->
			</div>
			<div class="tabCon">
			@if (count($errors) > 0)
				<div class="Huialert Huialert-error">
				<i class="Hui-iconfont">&#xe6a6;</i>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
            @endif
				 
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						品牌名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{{old('title')}}" placeholder="请输入栏目名称" id="" name="title" >
					</div>
					<div class="col-3">
					</div>
				</div>
				 
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">LOGO：</label>
					<div class="formControls col-xs-8 col-sm-9">
					<span class="btn-upload form-group">
					<input class="input-text upload-url" type="text" name="logo" id="uploadfile-2" readonly style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 上传logo</a>
					<input  type="file" id="upload" multiple name="file-2" class="input-file">
					</span>
					<img id="image" src="" class="img-responsive" alt="响应式图片">
					</div>
					<div class="col-3 formControls">
					 
					</div>
				</div>

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">具体描述：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<textarea name="descr" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true"  ></textarea>
						<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
					</div>
	            </div>

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">排序：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="0" placeholder="0" id="" name="order">
					</div>
					<div class="col-3">
					</div>
				</div>
				 
			</div>
			 
			 
		<div class="row cl">
			<div class="col-9 col-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				<input class="btn btn-primary radius" type="reset" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
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
	
	$("#tab-category").Huitab({
		index:0
	});

	$("#form-category-add").validate({
		rules:{
			title:{
				required:true,
				// minlength:3,
				// maxlength:16
			},
			logo:{
				required:true,
			},
			order:{
				required:true,
			}	 
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
            //表单ajax方式提交
			$(form).ajaxSubmit({
				type: 'post', // 提交方式 get/post
				url: '/admin/brand', // 需要提交的 url
				// data:{
                //   "_token": "{{ csrf_token() }}",     
			    // }, 
				success: function(data){
					 console.log(data);
					 layer.msg('已添加!',{icon:1,time:1000});
					 setTimeout(function(){ 
					window.parent.location.reload();
					var index = parent.layer.getFrameIndex(window.name);
					parent.layer.close(index);
					 },2000);
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:1000});
				}
			});
		}
	});

	//图片上传 
	$('#upload').change(function(){
       //alert("文本已被修改");
	   var img =$("#upload")[0].files[0];
	   var form = new FormData();
       form.append("img", img);
	   form.append("_token","{{ csrf_token() }}");
	//    var formData = new FormData();
	//    formData.append("logo666",this);
	   console.log(form);
	   $.ajax({
				type: 'post', // 提交方式 get/post
				url: '/admin/brand/upload', // 需要提交的 url
				data: form,
				processData: false,
                contentType : false,
				success: function(data){
					 //console.log(data);
					 layer.msg('图片上传成功!',{icon:1,time:1000});
					 $("#uploadfile-2").val(data.img_name);
					 $("#image").attr("src",data.img_name); 
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:1000});
				}
		});
    });
	 
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>