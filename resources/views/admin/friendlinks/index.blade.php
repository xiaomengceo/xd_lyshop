<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<style>
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
<title>友情链接列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 链接列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<button onclick="removeIframe()" class="btn btn-primary radius">关闭选项卡</button>
	 日期范围：
	 <form action="/admin/friend_links" method="get">
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" name="date_start" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" name="date_end" class="input-text Wdate" style="width:120px;">
		
		<input type="text" name="links_name" id="" value="{{ $res['search'] or '' }}" placeholder=" 资讯名称" style="width:250px" class="input-text">
		<input name="" id="" class="btn btn-success" type="submit" value=" 搜资讯">
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加资讯" data-href="article-add.html" onclick="Hui_admin_tab('查看','','800','600')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加链接名称</a></span> <span class="r">共有数据：<strong style="color:red;font-size: 20px">{{ $num }}</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					
					<th>编号</th>
					<th>链接名称</th>
				
					<th width="120">链接官网</th>
				
					<th width="80">logo</th>
					
					
					
					<th width="60">状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $key=>$val)
				<tr class="text-c">
					<td><input type="checkbox" value="{{$val->id}}" name=""></td>
					<td>{{$val->id}}</td>
					<td>{{$val->links_name}}</td>
					<td  class="text-l">{{$val->path}}</td>

					<td><img src="/uploads/{{$val->logo}}" style="width:50px;height:50px"></td>
					<td class="td-status"><span class="label label-success radius">显示</span></td>
					<td class="f-14 td-manage"><a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;" title="隐藏"><i class="Hui-iconfont">&#xe6de;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','/admin/friend_links/{{ $val->id }}/edit','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'{{$val->id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
			<div style="float:right">{{ $data->appends($request)->links() }}</div>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">


/*友情链接-添加*/
function Hui_admin_tab(title,url,w,h){
	var index = layer.open({	
		type: 2,
		content: '/admin/friend_links/create',
		});
	layer.full(index);
}	
		

/*友情链接-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		/*title: title,*/
		content: url
	});
	layer.full(index);
}
/*友情链接-删除*/
function article_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'delete',
			url: '/admin/friend_links/'+id,
			dataType: 'json',
			data:{
                "_token": "{{ csrf_token() }}",        
                
			}, 
			success: function(data){
				alert(1111);
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				alert(id);
				console.log(data.msg);
			},
		});		
	});
}

/*友情链接-审核*/
function article_shenhe(obj,id){
	layer.confirm('审核文章？', {
		btn: ['通过','不通过','取消'], 
		shade: false,
		closeBtn: 0
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布', {icon:6,time:1000});
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
		$(obj).remove();
    	layer.msg('未通过', {icon:5,time:1000});
	});	
}
/*友情链接-下架*/
function article_stop(obj,id){
	layer.confirm('确认要隐藏吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已隐藏</span>');
		$(obj).remove();
		layer.msg('已隐藏!',{icon: 5,time:1000});
	});
}

/*友情链接-发布*/
function article_start(obj,id){
	layer.confirm('确认要显示吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">显示</span>');
		$(obj).remove();
		layer.msg('显示!',{icon: 6,time:1000});
	});
}
/*友情链接-申请上线*/
function article_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

/*加载批量删除数据的方法*/

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
			url:"/admin/friend_links/delall",
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
</body>
</html>