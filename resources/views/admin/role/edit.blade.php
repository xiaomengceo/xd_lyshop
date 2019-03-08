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

<title>新建网站角色 - 管理员管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form action="/admin/role" method="post" class="form form-horizontal" id="form-admin-role-edit">
	{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$data->title}}" placeholder="" id="roleName" name="title">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$data->commit}} " placeholder="" id="" name="commit">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">网站角色：</label>
			<div class="formControls col-xs-8 col-sm-9">
			    @foreach($role_data as $k=>$v)
				@if ($v->pid==0)
				<dl class="permission-list">
					<dt>
						<label>
							<input type="checkbox" @if(in_array($v->id,$data->rules)) checked @endif value="{{$v->id}}" name="user-Character[]" id="user-Character-0">
							{{$v->title}}</label>
					</dt>
					<dd>
					    @foreach($role_data as $kk=>$vv)
						@if ($v->id==$vv->pid)
						<dl class="cl permission-list2">
							<dt>
								<label class="">
									<input @if(in_array($v->id,$data->rules)) checked @endif type="checkbox" value="{{$vv->id}}" name="user-Character[]" id="user-Character-0-0">
									 {{$vv->title}}</label>
							</dt>
							<dd>
							 @foreach($role_data as $kkk=>$vvv)
						     @if ($vv->id==$vvv->pid)
								<label class="">
									<input @if(in_array($v->id,$data->rules)) checked @endif type="checkbox" value="{{$vvv->id}}" name="user-Character[]" id="user-Character-0-0-3">
									{{$vvv->title}}</label>
									@endif
				              @endforeach	
							</dd>
						</dl>
						@endif
						@endforeach 
					</dd>
				</dl>
				@endif
				@endforeach
				 
			</div>
		</div>
		<div class="row cl">
						<label class="form-label col-xs-4 col-sm-3">单选框：</label>
						<div class="formControls skin-minimal col-xs-8 col-sm-9">
						<div class="radio-box">
							<input type="radio" value="1" @if($data->status==1) checked @endif id="radio-1" name="status">
							<label for="radio-1">启用</label>
                        </div>
						<div class="radio-box">
							<input type="radio" value="0" @if($data->status==0) checked @endif id="radio-1" name="status">
							<label for="radio-1">禁用</label>
                        </div>	 
						</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="submit" class="btn btn-success radius" id="admin-role-save"  ><i class="icon-ok"></i> 确定</button>
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
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});
	
	$("#form-admin-role-edit").validate({
		rules:{
			title:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			//ajax 提交，成功则提示并关闭窗口
			$(form).ajaxSubmit({
				type: 'put', // 提交方式 get/post
				url: '/admin/role/{{$data->id}}', // 需要提交的 url
				data:{
                  "_token": "{{ csrf_token() }}",          
			    }, 
			    dataType:"json",
				success: function(data) { 
					 //console.log(data.data);
					 layer.msg('已修改!',{icon:1,time:1000});
					 setTimeout(function(){ 
						var index = parent.layer.getFrameIndex(window.name);
			        parent.layer.close(index);
					 },2000);
					 
				},
				error:function(data) {
					console.log(data);
					 
				}
	        });
			 
			/**下面2行代码可以关闭弹出的窗口，要注意在ajax里面必须加在success里面 */ 
			//  var index = parent.layer.getFrameIndex(window.name);
			//  parent.layer.close(index);	 
		}
	});

	
});
 
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>