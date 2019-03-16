<!--_meta 作为公共模版分离出去-->
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

<link href="/admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
	<form action="/admin/product/{{$product->id}}" method="post" class="form form-horizontal" id="form-product-add">
    {{ csrf_field() }}
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$product->title}}" placeholder="" id="" name="title">
			</div>
		</div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品品牌：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="brand_id" class="select">
				        @if($product->brand_id==0)
                        <option value="0" selected>默认不选</option>
						@else
						<option value="0">默认不选</option>
						@endif
                        @foreach($brands as $k=>$v)
						  @if($product->brand_id==$v->id)
                          <option value="{{$v->id}}" selected>{{$v->title}}</option>
						  @else
						  <option value="{{$v->id}}">{{$v->title}}</option>
						  @endif
                        @endforeach
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品分类：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="type_id" class="select">
                        @foreach($cates as $k=>$v)
						 @if($product->type_id==$v->id)
                         <option value="{{$v->id}}" selected>{{$v->title}}</option>
						@else
						 <option value="{{$v->id}}">{{$v->title}}</option>
						@endif
                        @endforeach
				</select>
				</span> </div>
		</div>
         
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">允许评论：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="check-box">
				    @if($product->turn==1)
					<input type="checkbox" value="1" checked id="checkbox-1" name="turn">
					@else
					<input type="checkbox" value="1"   id="checkbox-1" name="turn">
					@endif
					<label for="checkbox-1">&nbsp;</label>
				</div>
			</div>
		</div>
        <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2">产品规格：</label>
			<div id="guige" class="formControls col-xs-8 col-sm-9"> 
                <span class="select-box">
                    <select name="spec_id" id="prop" class="select">
                        @if($product->spec_id==0)
						<option value="0" selected>默认规格</option>
						@else
						<option value="0">默认规格</option>
						@endif
                        @foreach($propertys as $k=>$v)
						 @if($product->spec_id==$v->id)
                         <option value="{{$v->id}}" selected>{{$v->title}}</option>
						 @else
						 <option value="{{$v->id}}">{{$v->title}}</option>
						 @endif
                        @endforeach
                    </select>
                </span>
                <table class="table table-border table-bg table-bordered">
                    <thead>
                        <tr>
                            <th width="20%">商品规格</th>
                            <th>市场价格</th>
                            <th>销售价格</th>
                            <th>规格状态</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @if($properties==null)
                        <tr class="active">
                            <td>默认规格</th>
                            <td>
                              <span style="display:block;float:left;" class="label label-primary radius">金额</span><input name="price[]" value="{{$sku->market_price}}"   type="text" placeholder="元" class="input-text radius size-S">
                            </td>
                            <td>
                              <span class="label label-primary radius">金额</span><input name="market_price[]" value="{{$sku->price}}" type="text" placeholder="元" class="input-text radius size-S">
                            </th>
                            <td>
                             <input name="status" type="checkbox" id="checkbox-1" checked="">
                             <label for="checkbox-1">启用</label>
                             <input type="hidden" name="product_spec[]" value="default:default">
                            </td>
                        </tr>
                        @else
						@foreach($sku as $k=>$v)
						<tr class="active">
                            <td>{{$v->product_spec}}</th>
                            <td>
                              <span style="display:block;float:left;" class="label label-primary radius">金额</span><input name="price[]" value="{{$v->market_price}}"  type="text" placeholder="元" class="input-text radius size-S">
                            </td>
                            <td>
                              <span class="label label-primary radius">金额</span><input name="market_price[]" value="{{$v->price}}" type="text" placeholder="元" class="input-text radius size-S">
                            </th>
                            <td>
                             <input name="status" type="checkbox" id="checkbox-1" checked="">
                             <label for="checkbox-1">启用</label>
                             <input type="hidden" name="product_spec[]" value="{{$v->product_spec}}">
                            </td>
                        </tr>
						@endforeach
						@endif
                    </tbody>
                </table>
             </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">所属供应商：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="company" id="" placeholder="" value="{{$product->company}}" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">产品关键字：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="key_words" id="" placeholder="多个关键字用英文逗号隔开，限10个关键字" value="{{$product->key_words}}" class="input-text">
			</div>
		</div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$product->order}}" placeholder="" id="" name="order">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">产品摘要：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="abstract" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" >{{$product->abstract}}</textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		 
        <div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
					<div class="formControls col-xs-8 col-sm-9">
					<span class="btn-upload form-group">
					<input class="input-text upload-url" type="text" name="logo" value="{{$product->gpic}}" id="uploadfile-2" readonly style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 选择图片</a>
					<input  type="file" id="upload" multiple   name="file-2" class="input-file">
					</span>
					<img id="image" src="{{$product->gpic}}" class="img-responsive" alt="响应式图片">
					</div>
					<div class="col-3 formControls">
					 
					</div>
		</div>

        <div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">商品图片组：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="btn-upload form-group">
						<input class="input-text upload-url" type="text" name="pic[]" id="uploadfiles-2" readonly style="width:200px">
						<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 按住ctrl选择多张图片</a>
						<input  type="file" id="uploads" multiple name="pic-2[]" class="input-file">
						<input type="hidden" id="imgspath" name="imgspath" value="{{$imgspath}}" >
						</span>
					    <div  col-xs-8 col-sm-9" id="piclist">
						   @foreach($images as $k=>$v)
						   <img id="image" src="{{$v->img}}" class="img-responsive" alt="响应式图片">
						   @endforeach
					    </div>
					</div>
					<div class="col-3 formControls">
					  
					</div>
		</div>
		 
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">详细内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script name="descr" id="editor" type="text/plain" style="width:100%;height:400px;">{!!$product->descr!!}</script> 
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button   class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 提交</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
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
    
    /*切换规格时调用*/
    $('#prop').change(function(){
        
       //$('tbody').prepend('666666');              
       var a={!!$json!!};
       var c='';
       var id=$(this).children('option:selected').val(); 
       if(id==0){
        $('#tbody').children().remove();
        $('#tbody').prepend('<tr class="active"> <td>默认规格</th><td><span   class="label label-primary radius">金额</span><input name="price[]"   type="text" placeholder="元" class="input-text radius size-S"></td> <td><span class="label label-primary radius">金额</span><input name="market_price[]" type="text" placeholder="元" class="input-text radius size-S"></td><td><input name="status" type="checkbox" id="checkbox-1" checked=""><label for="checkbox-1">启用</label></td><input type="hidden" name="product_spec[]" value="default:default"></tr>');
       }else{  
         console.log(a[id]);
         console.log(typeof(a[id]));
         $.each(a[id], function(i, item){  
            $('#tbody').children().remove();   
            c+='<tr class="active"> <td>'+item+'</th><td><span   class="label label-primary radius">金额</span><input name="price[]"   type="text" placeholder="元" class="input-text radius size-S"></td> <td><span class="label label-primary radius">金额</span><input name="market_price[]" type="text" placeholder="元" class="input-text radius size-S"></th><td><input name="status" type="checkbox" id="checkbox-1" checked=""><label for="checkbox-1">启用</label></td><input type="hidden" name="product_spec[]" value="'+item+'"></tr>';  
         }); 
         $('#tbody').prepend(c);
         
       }
	  
    });

    //单图片上传 
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
				url: '/admin/product/upload', // 需要提交的 url
				data: form,
				processData: false,
                contentType : false,
				success: function(data){
					 console.log(data);
					 layer.msg('图片上传成功!',{icon:1,time:1000});
					 $("#uploadfile-2").val(data.img_name);
					 $("#image").attr("src",data.img_name); 
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:1000});
				}
		});
    });
    //end单图片上传 

    //多图片上传 
	$('#uploads').change(function(){
       var form = new FormData();
	   var length=$("#uploads")[0].files.length;
	   //图片地址储存的地方
	   var imgspath=$('#imgspath');
	   //图片展示的地方
	   var piclist=$('#piclist');
       for(var i=0; i<length;i++){
         form.append('imgs[]', $("#uploads")[0].files[i]);
       }
	   form.append("_token","{{ csrf_token() }}");
	   console.log(form);
	   $.ajax({
				type: 'post', // 提交方式 get/post
				url: '/admin/product/uploads', // 需要提交的 url
				data: form,
				processData: false,
                contentType : false,
				success: function(data){
					 console.log(data);
					 var paths=data.imagpaths.join(',');
					 //储存图片路径
					 imgspath.val(paths);
					 console.log(imgspath[0]);
					 var imgs='';
					 $.each(data.imagpaths,function(index,value){
                       imgs+=' <img id="image" src="'+value+'" class="img-responsive" alt="响应式图片">';
					 });
					 //显示图片
					 piclist.children().remove();
					 piclist.prepend(imgs);
					 layer.msg('多图片上传成功!',{icon:1,time:1000});
					// $("#uploadfile-2").val(data.img_name);
					 //$("#image").attr("src",data.img_name); 
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:1000});
				}
		});
    });
    //end单图片上传 
	
    //表单提交
	$("#form-product-add").validate({
		rules:{
			title:{
				required:true,
				// minlength:3,
				// maxlength:16
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			 
            //表单ajax方式提交
			$(form).ajaxSubmit({
				type: 'post', // 提交方式  
				url: '/admin/product/{{$product->id}}', // 需要提交的 url
				data:{
                  "_token": "{{ csrf_token() }}",
				  "_method": "put"  //伪装为put，直接用put会在修改图片后出错 （一个坑）
			    }, 
				success: function(data){
					 console.log(data);
					 layer.msg('修改成功!',{icon:1,time:1000});
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
	//end表单提交

	//让用户可以自主选择添加那些规格
   //动态添加的元素需要绑定他的祖先才能能触发事件
   $("#tbody").on("click", 'input[type="checkbox"]',function(){ 
	  if(this.checked){
		  //alert(1);
		  var p=$(this).parent().parent();
		  $.each(p.find('input'), function(i,v){ 
                n=$(v).attr("name");
				var str=n.replace('xm','');
				$(v).attr("name",str);
		  });
		  console.log(p[0]); 
	  }else{
		  var p=$(this).parent().parent();
		  $.each(p.find('input'), function(i,v){ 
                n=$(v).attr("name");
				$(v).attr("name","xm"+n);
		  });
		  console.log(p[0]);
	  }
    });

});
//百度编辑器
$(function(){
	var ue = UE.getEditor('editor');
});

 
</script>
</body>
</html>