<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<style type="text/css">

	.pagination {
    padding-left: 20px;
    margin: 1.5rem 0;
    list-style: none;
    color: #999999;
    text-align: left;
	}
	.pagination:before,
	.pagination:after {
		content: " ";
		display: table;
	}
	.pagination:after {
		clear: both;
	}
	.pagination > li {
		float:left;
		display: inline-block;
	}
	.pagination > li > a,
	.pagination > li > span {
		position: relative;
		display: block;
		padding: 0.5em 1em;
		text-decoration: none;
		line-height: 1.2;
		background-color: #fff;
		border: 1px solid #ddd;
		border-radius: 0;
	}
	.pagination > li:last-child > a,
	.pagination > li:last-child > span {
		margin-right: 0;
	}
	.pagination > li > a:hover,
	.pagination > li > span:hover,
	.pagination > li > a:focus,
	.pagination > li > span:focus {
		background-color: #eeeeee;
	}
	.pagination > .active > a,
	.pagination > .active > span,
	.pagination > .active > a:hover,
	.pagination > .active > span:hover,
	.pagination > .active > a:focus,
	.pagination > .active > span:focus {
		z-index: 2;
		color: #fff;
		background-color: #0e90d2;
		border-color: #0e90d2;
		cursor: default;
	}
	.pagination > .disabled > span,
	.pagination > .disabled > span:hover,
	.pagination > .disabled > span:focus,
	.pagination > .disabled > a,
	.pagination > .disabled > a:hover,
	.pagination > .disabled > a:focus {
		color: #999999;
		background-color: #fff;
		border-color: #ddd;
		cursor: not-allowed;
		pointer-events: none;
	}
	.pagination .pagination-prev {
		float: left;
	}
	.pagination .pagination-prev a {
		border-radius: 0;
	}
	.pagination .pagination-next {
		float: right;
	}
	.pagination .pagination-next a {
		border-radius: 0;
	}
	.pagination-centered {
		text-align: center;
	}
	.pagination-right {
		text-align: right;
	}
</style>

<title订单物流信息管理</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单物流信息管理 <span class="c-gray en">&gt;</span>订单物流信息管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form action="" method="get">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" name="date_start" value="{{ $date_start }}" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" name="date_end" value="{{ $date_end }}" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入物流名称" value="{{ $search }}" id="logistics_name" name="logistics_name">
		<i class="Hui-iconfont">&#xe665;</i> 
		<input type="submit" class="btn btn-success" id=""  name="" value="搜快递">
	</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="admin_add('添加订单物流信息','/admin/order_logis/create','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加订单物流信息</a></span> <span class="r">共有数据：<strong style="color:red;font-size: 20px">{{ $num or '' }}</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">物流名称</th>
				<th width="250">配送人手机</th>
				<th width="230">收货人电话</th>
				<th width="230">加入时间</th>
				<th width="230">订单编号</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $val)
			<tr class="text-c">
				<td><input type="checkbox" value="{{ $val->id }}" name=""></td>
				<td>{{ $val->id }}</td>
				<td>{{ $val->logistics_name }}</td>
				<td>{{ $val->telephone }}</td>
				<td>{{ $val->phone }}</td>
				<td>{{ $val->created_at }}</td>
				<td>{{ $val->order_code }}</td>
				<td class="td-status"><span class="label radius">已停用</span></td>
				<td class="td-manage"><a style="text-decoration:none" onClick="admin_start(this,'10001')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i></a> <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','/admin/order_logis/{{ $val->id }}/edit','2','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_del(this,'{{ $val->id }}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div style="float:right">{{ $data->appends($request)->links() }}</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'DELETE',
			url: '/admin/order_logis/'+id,
			dataType: 'json',
			data:{
                "_token": "{{ csrf_token() }}",        
                
			}, 
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!', {icon: 6,time:1000});
	});
}

/*批量删除的函数*/
function datadel(){
	layer.confirm('确认要全部删除吗？',function(index){
		var ck=$("tbody input[type='checkbox']");
		var items = [];
		for (var i=0; i<ck.length; i++) {
				if (ck[i].checked) {
						items.push(ck[i].value);        // 将id都放进数组
				}
		}
		if (items == null || items.length == 0){     // 当没选的时候，不做任何操作
				return false;
		}
		//ajaxbegain
		$.ajax({
			type: 'post',
			url:"/admin/order_logis/delall",
			data:{
                "_token": "{{ csrf_token() }}",
				"keys": items ,        
			}, 
			dataType:"json", 
			success: function(data){
				for (var i=0; i<ck.length; i++) {
					if (ck[i].checked) {
						$(ck[i]).parents("tr").remove(); 
						console.log(ck[i]);     
					}
		        }
			    layer.msg('批量删除成功!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
		//ajaxend
	});
}
</script>
</script>
</body>
</html>