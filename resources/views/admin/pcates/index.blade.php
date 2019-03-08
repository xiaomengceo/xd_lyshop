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
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>商品分类管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	商品管理
	<span class="c-gray en">&gt;</span>
	分类管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div class="text-c">
	   <form action="/admin/pcates" method="get">
		<input type="text" name="search" value="{{ $request['search'] or '' }}" id="" placeholder="分类名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	   </form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		<a class="btn btn-primary radius" onclick="system_category_add('分类管理','/admin/pcates/create')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a>
		</span>
		<span class="r">共有数据：<strong>{{$count}}</strong> 条</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">排序</th>
					<th>分类名称</th>
					<th>状态</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			    @foreach ($data as $v)
				<tr class="text-c">
					<td><input type="checkbox" name="" value="{{$v->id}}"></td>
					<td>{{$v->id}}</td>
					<td>{{$v->paths}}</td>
					<td class="text-l">{{$v->title}}</td>
					<td>@if($v->status==1)已启用@else已禁用@endif</td>
					<td class="f-14"><a title="添加子分类" href="javascript:;" onclick="child_category_add('添加子分类','/admin/pcates/add_child/{{$v->id}}','1','700','480')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe610;</i></a>
					  <a title="编辑" href="javascript:;" onclick="system_category_edit('编辑分类','/admin/pcates/{{$v->id}}/edit','1','700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a title="删除" href="javascript:;" onclick="system_category_del(this,'{{$v->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
						</td>
				</tr>
			   @endforeach


				 
			</tbody>
		</table>
		 
		 
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
$('.table-sort').dataTable({
	"aaSorting": [[ 0, "asc" ]],//选择0按第一列排序就可以默认数据原样展示
	"bStateSave": false,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,5]}// 制定列不参与排序
	]
});
/*系统-栏目-添加*/
function system_category_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/**添加子栏目 */
function child_category_add(title,url,id,w,h){
  layer_show(title,url,w,h);
}
/*系统-栏目-编辑*/
function system_category_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
	// parent.location.reload();
	 
}
/*系统-栏目-删除*/
function system_category_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'delete',
			url:"/admin/pcates/"+id,
			data:{
                "_token": "{{ csrf_token() }}",          
			}, 
			dataType:"json", 
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
//批量删除
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
			url:"/admin/pcates/delall",
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