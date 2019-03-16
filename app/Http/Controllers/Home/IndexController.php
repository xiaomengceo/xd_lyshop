<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ProductCates;
use App\Model\Product;
use App\Model\ProductSku;
class IndexController extends Controller
{
    //处理字符串
    public static function array_group($arr,$key){     
        $result =  [];  //初始化一个数组
        foreach($arr as $k=>$v){
              $result[$v[$key]][] = $v['value'];  //把$key对应的值作为键 进行数组重新赋值
        }
        return $result;
    }
    //得到分类
    public static function get_cates($pid=0){
      $cates_data=ProductCates::where('pid',$pid)->get();//一级
      $array=[];
      foreach( $cates_data as $k=>$v){
        $v['sub']=self::get_cates($v->id);//查到的分类值保存到属性里
        $array[]=$v;//最后将结果塞入数组
      }
      return $array;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $cates=self::get_cates();
        $goods=[];
        foreach($cates as $k=>$v){
             foreach($v['sub'] as $kk=>$vv){
                 foreach($vv['sub'] as $kkk=>$vvv){
                     $good=ProductCates::find($vvv->id)->product;
                     if(!$good->isempty()){
                        $goods[$v->id][$vvv->id]=$good;
                         
                     }
                    
                 }
             }
        }
        // dd($goods);
        return view('home.index.index',['cates'=>$cates,'goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 加载商品详情页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //查出商品详情
        $info=Product::find($id);
        //遍历出商品组图
        $images=$info->product_img;
        //遍历出所有型号的商品
        $products=Product::find($id)->product_sku;
        // dump($products);
        //处理规格模板中的数据
        $spec=$info->property_name;
        if($spec==null){
           //走默认规格
           $propertie_data=[];
        }else{
            $properties=$spec->properties;
            $arr=json_decode($properties,true);
            $propertie_data=self::array_group($arr,'name');
        }
        //处理默认商品的规格
        $dd= $products[0]['product_spec'];
        $sp=[];
        $dd=explode(",",$dd);
        foreach($dd as $k=>$v){
           $p=explode(':',$v);
           $sp[$p[0]]=$p[1];
        }
        //dump( $properties);
        return view('home.index.show',['images'=>$images,'products'=>$products,'info'=>$info,'propertie_data'=>$propertie_data,'sp'=>$sp]);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //动态改变商品
    public function change_product($id){
        $product=ProductSku::find($id);
         
        return $product;
    }
}
