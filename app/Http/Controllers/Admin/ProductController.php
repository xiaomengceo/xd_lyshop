<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\PropertyName;
use App\Model\ProductBrand;
use App\Model\ProductSku;
use App\Http\Controllers\Admin\PcatesController;
/**
 * 商品管理
 */
class ProductController extends Controller
{
    /**
     * php数组根据相同值再分组，专门处理规格数据属性值的归类
     *
     * @return \Illuminate\Http\Response
     */
    public function array_group($arr,$key){     
        $result =  [];  //初始化一个数组
        foreach($arr as $k=>$v){
              $result[$v[$key]][] = $v['value'];  //把$key对应的值作为键 进行数组重新赋值
        }
        return $result;
    }
    
    //生成排列组合好的属性值组合
    public function orders(array $data){
        $arr=[];
        $clone=[];
        $i=0;
        foreach($data as $k=>$v){
            if($i<=0){
                foreach($v as $x=>$z){
                   $v[$x]=$k.':'.$z;
                }
                $clone=$v; 
                //echo $i;
                $i++;
            }else{
                foreach($v as $kk=>$vv){ 
                    foreach($clone as $kkk=>$vvv){
                        $arr[]=$k.':'.$vv.','.$vvv;
                    }
                }
                $clone=$arr;
                //此处要清空arr数组
                $arr=[];
            } 
        }
        return $clone;
    }

     

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data='[{"name":"厚度","value":"超厚"},{"name":"厚度","value":"一般厚"},{"name":"颜色","value":"黑"},{"name":"颜色","value":"白"},{"name":"型号","value":"大"},{"name":"型号","value":"小"}]';
        //$data=json_decode($data,true);
        //dump($data);
        //$data=$this->array_group($data,'name');
        //dump($data);
        //$data=$this->orders($data);
        //dump($data);
        //$json=json_encode($data);
        $product=Product::get();
        foreach($product as $k=>$v){
            $p=[];
            $mp=[];
            $ku=[];
            $sa=[];
            $sku=$v->product_sku;
            if($sku->isEmpty()){
                //过滤错误数据(商品主表与附表信息不匹配的垃圾数据)
                unset($product[$k]);
            }else{   
                foreach($sku as $kk=>$vv){
                      $p[]=$vv->price;
                      $mp[]=$vv->market_price;
                      $ku[]=$vv->stock;
                      $sa[]=$vv->sales;
                } 
                $product[$k]['price']=$p;
                $product[$k]['market_price']=$mp;
                $product[$k]['stock']=$ku;
                $product[$k]['sales']=$sa;    
            }
                
              
        }
        return view('admin.product.index',['product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //取得商品分类数据
        $cates=PcatesController::category();
        //取得规格数据
        $propertys=PropertyName::all();
        //处理规格数据
        $arr=[];
        foreach($propertys as $k=>$v){
            //dd($v->properties);
          $zu=json_decode($v->properties,true);
          //dd($zu);
          $da=$this->array_group($zu,'name');
          $da=$this->orders($da);
          //将模板id作为键
          $arr[$v->id]=$da;
        }
        //dump($arr);
        $json=json_encode($arr);
        //取得品牌数据
        $brands=ProductBrand::all();
        return view('admin.product.create',['cates'=>$cates,'propertys'=>$propertys,'brands'=>$brands,'json'=>$json]);
    }

    //获取指定规格的数据并返回给前端
    public function get_pcate($id){
        $res=1;
        if ($res) {
            $data = [
                'status' => 1,
                'msg' => '添加成功',
                'd'=>$data,
            ];
        }else{
            $data = [
                'status' => 0,
                'msg' => '添加失败'
            ];
        }
        $data=json_encode($data);
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');
        //dd($data);
        $obj=new Product; 
        $obj->pro_num=mt_rand(1000,9000);
        $obj->title=$data['title'];
        $obj->brand_id=$data['brand_id'];
        $obj->type_id=$data['type_id'];
        $obj->spec_id=$data['spec_id'];
        $obj->turn=$request->input('turn',0);
        $obj->company=$data['company'];
        $obj->key_words=$data['key_words'];
        $obj->order=$data['order'];
        $obj->abstract=$data['abstract'];
        $obj->gpic=$data['logo'];
        $obj->descr=$data['descr'];
        $res=$obj->save();
        
         //接受价格并处理
        $price=$data['price'];
        $market_price=$data['market_price'];
        $product_spec=$data['product_spec'];
        $id=$obj->id;
        foreach($price as $k=>$v){
            //为关联模型添加数据
            //似乎模型有缓存，要用不一样的名字保存实例化的对象
            //$sku='test'.$k;
            $sku = new ProductSku;
            $sku->product_id=$id;
            $sku->product_spec=$product_spec[$k];
            $sku->price=$v;
            $sku->market_price=$market_price[$k];
            $res=$sku->save();
        }
        
        $res=1;
        if ($res) {
            $data = [
                'status' => 1,
                'msg' => '添加成功',
                // 'd'=>$price,
            ];
        }else{
            $data = [
                'status' => 0,
                'msg' => '添加失败'
            ];
        }
        $data=json_encode($data);
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 加载入库页面
     */
    public function in_store($id){
         $p=Product::find($id);
         $title=$p->title;
         //查出规格数据
         $skus =Product::find($id)->product_sku;
         return view('admin.product.in_store',['title'=>$title,'skus'=>$skus]);
    }
    /**
     * 保存入库数据，完成入库操作
     */
    public function save_store(Request $request){
        $datas=$request->all();
        //$sku=new ProductSku;
        $stock_desc=$datas['stock_desc'];
        $stocks=$datas['stock'];
        foreach($stocks as $k=>$v){
            $ku=ProductSku::find($k);
            $ku->stock=$v;
            $ku->stock_desc=$stock_desc;
            $res= $ku->save();
        }
        $res=1;
        if ($res) {
            $data = [
                'status' => 1,
                'msg' => '入库成功',
                'd'=>$stocks
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '删除失败'
            ];
        }
        $data=json_encode($data);
        return $data;   
    }


    /**
     *  删除单个商品的主表数据，同时删除关联的附表数据
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //先把数据查出来，再做删除，否则会报错，
        //关联模型数据依赖当前模型数据
        $skus =Product::find($id)->product_sku;
        $re=Product::find($id)->delete();
        if($skus->isEmpty()){
            //如果从关联表查找不到数据直接返回1
            $res=true;
        }else{
            foreach($skus  as $k=>$v){
                $res=$v->delete();
            }
        }    
        if ($re&&$res) {
            $data = [
                'status' => 1,
                'msg' => '删除成功',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg' => '删除失败'
            ];
        }
        $data=json_encode($data);
        return $data;
    }

    /**
     * 批量删除
     */
    public function delall(Request $request)
    {
        for ($i=0; $i<count($request['keys']); $i++) {
              $skus =Product::find($request['keys'][$i])->product_sku;
              if($skus->isEmpty()){
                //如果从关联表查找不到数据直接返回1
                $res=true;
              }else{
                    foreach($skus  as $k=>$v){
                        $res=$v->delete();
                    }
              } 
              // 遍历删除
              $res =Product::find($request['keys'][$i])->delete();   
        }
        
        if ($res) {
            $data = [
                'status' => 0,
                'msg' => '删除成功'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '删除失败'
            ];
        }
        $data=json_encode($data);
        return $data;   
    }

    //图片上传
    public function upload(Request $request){
        //$data=$request->all();
         
        //执行文件上传
       if($request->hasFile('img')){
          $file_name=$request->file('img')->store('products');
          $res=true;
        }else{
          $res=false;
        }
        if($res){
            return  $data = [
                'status' => 1,
                'msg' => '图片上传成功',
                'img_name'=>'/uploads/'.$file_name
                
            ];
        }else{
            return  $data = [
                'status' => 0,
                'msg' => '图片上传失败',
                
            ];
        } 
    }

    //多图片上传，储存商品组图
    public function uploads(Request $request){
        $imagpaths=[];
        if($request->hasFile('imgs')){
            foreach($request->file('imgs') as $img){
                //执行文件上传
                $file_name=$img->store('products');
                $imagpaths[]=$file_name;
                $res=true;
            } 
            //$imagpaths=json_encode($imagpaths);
        }else{
            $res=false;
        }
        if($res){
                $data = [
                'status' => 1,
                'msg' => '多图片上传成功',
                'imagpaths'=>$imagpaths
            ];
        }else{
                $data = [
                'status' => 0,
                'msg' => '多图片上传失败',
                
            ];
        } 
        //$data=json_encode($data,JSON_UNESCAPED_UNICODE);
        //不传json数据的话是以一个对象传递到前台js的
        return $data;
    }

     /**
      * 产品上下架
      */
      public function change(Request $request, $id){
        $admin_data =Product::find($id);
        $admin_data->status=$request->input('status');
        $res=$admin_data->save();
        if($res){
            $data = [
                'status' => 1,
                'msg' => '成功'
            ];
             
        }else{
            $data = [
                'status' => 0,
                'msg' => '失败'
            ];
            
        }
        $data=json_encode($data);
        return $data;
    }

}
