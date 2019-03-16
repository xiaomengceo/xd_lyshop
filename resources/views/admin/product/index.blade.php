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
<title>商品列表</title>
<link rel="stylesheet" href="lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
</head>
<body class="pos-r">
<div style="">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<div class="text-c"> 日期范围：
			<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
			-
			<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
			<input type="text" name="" id="" placeholder=" 产品名称" style="width:250px" class="input-text">
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜产品</button>
		</div>
		<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="product_add('添加产品','/admin/product/create')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加产品</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-bg table-hover table-sort">
				<thead>
					<tr class="text-c">
						<th width="40"><input name="" type="checkbox" value=""></th>
						<th width="40">ID</th>
						<th width="60">缩略图</th>
						<th width="180">产品名称</th>
						<th>描述</th>
						<th width="100">售价 (原价)</th>
						<th width="100">库存 (剩余,已售)</th>
						<th width="60">发布状态</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
				   @foreach($product as $k=>$v)
					<tr class="text-c va-m">
						<td><input name="" type="checkbox" value="{{$v->id}}"></td>
						<td>{{$v->id}}</td>
						<td>
						<a onClick="product_show('哥本哈根橡木地板','product-show.html','10001')" href="javascript:;"><img width="60" class="product-thumb" src="{{$v->gpic}}"></a></td>
						<td class="text-1">
						   @foreach($v->spec as $kk=>$vv)
						   <a style="text-decoration:none" onClick="product_show('哥本哈根橡木地板','product-show.html','10001')" href="javascript:;">{{$v->title}}</a> {{$vv}}<br>
						   @endforeach
						</td>
						<td class="text-l"> {{$v->abstract}} </td>
						<td>
						  @foreach($v->price as $kk=>$vv)
						  <span class="price">售  {{$v->market_price[$kk]}} ( 市  {{$vv}} )</span><br>
						  @endforeach
						</td>
						<td class="text-l">
						  @foreach($v->stock as $kk=>$vv)
						   存 {{$vv}} ( 剩 {{$vv-$v->sales[$kk]}}, 售 {{$v->sales[$kk]}} ) <br>
						  @endforeach
						 </td>
						<td class="td-status">
						  @if($v->status==1)
						    <span class="label label-success radius">已发布</span>
						  @else
							<span class="label label-defaunt radius">已下架</span>
						  
						  @endif
						</td>
						<td class="td-manage"> @if($v->status==1)<a style="text-decoration:none" onClick="product_stop(this,'{{$v->id}}')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>@else <a style="text-decoration:none" onClick="product_start(this,'{{$v->id}}')" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a> @endif <a href="javascript:;" title="商品入库" onClick="in_store('商品入库','/admin/product/in_store/{{$v->id}}')" href="">入库</a> <a style="text-decoration:none" class="ml-5" onClick="product_edit('产品编辑','/admin/product/{{$v->id}}/edit','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="product_del(this,'{{$v->id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
				   @endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
 		
 
$('.table-sort').dataTable({
	"aaSorting": [[ 0, "desc" ]],//默认第几个排序
	"bStateSave": false,//状态保存
	"aoColumnDefs": [
	  {"orderable":false,"aTargets":[0,3]}// 制定列不参与排序
	]
});
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/**商品入库 */
function in_store(title,url,w,h){
	layer_show(title,url,w,h);
}
/*产品-查看*/
function product_show(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
 
/*产品-下架*/
function product_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
        
		$.ajax({
			type: 'get',
			url:"/admin/product/change/"+id,
			data:{ 
				'status':0,
			}, 
			dataType:"json", 
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_start(this,'+id+')" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
				$(obj).remove();
				layer.msg('已下架!',{icon: 5,time:1000});
	 
			},
			error:function(data) {
				console.log(data);
			},
		});
		//ajaxend


	});
}

/*产品-发布*/
function product_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
        $.ajax({
			type: 'get',
			url:"/admin/product/change/"+id,
			data:{ 
				'status':1,
			}, 
			dataType:"json", 
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
				$(obj).remove();
				layer.msg('已发布!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data);
			},
		});



	});
}

 

/*产品-编辑*/
function product_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*产品-删除*/
function product_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'delete',
			url:"/admin/product/"+id,
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
			url:"/admin/product/delall",
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