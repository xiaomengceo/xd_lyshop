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

<title>添加栏目</title>
</head>
<body>
<div class="page-container">
	<form action="/admin/column" method="post" class="form form-horizontal" id="form-category-add">
	{{ csrf_field() }}
		<div id="tab-category" class="HuiTab">
			<div class="tabBar cl">
				<span>后台栏目添加</span>
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
						上级栏目：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" id="sel_Sub" name="pid" >
							<option value="0">顶级栏目</option>
							@foreach($column_data as $k=>$v)
							<option value="{{$v->id}}">{{$v->title}}</option>
							@endforeach 
						</select>
						</span>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						栏目名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{{old('title')}}" placeholder="请输入栏目名称" id="" name="title" >
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">控制器方法名：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{{old('name')}}" placeholder="请输入控制器路由，如：/admin/index" id="" name="name">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">图标：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{{old('icon')}}" placeholder="选填，如：Hui-iconfont-down" id="" name="icon">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">状态：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select name="status" class="select">
							<option value="1" checked>显示</option>
							<option value="0">隐藏</option>
						</select>
						</span>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">排序：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="0" placeholder="0" id="" name="sort">
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
	 
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>