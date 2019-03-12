<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ProductCates;
use App\Model\Product;
use App\Model\ViewPagers;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取导航表里面的图片
        $imgs = ViewPagers::select('pictures')->get();
       
        /*将分类遍历到导航列表里面*/
      $cate_data = ProductCates::where('pid',0)->get();
      foreach($cate_data as $key => $value){
            $value['xia'] = ProductCates::where('pid', $value->id)->get();
            foreach($value['xia'] as $kk => $vv){
                $vv['xia'] = ProductCates::where('pid', $vv->id)->get();
            }
      }

      /*商品分类表里的所有字段的数据*/
        $types = ProductCates::all();
      // dd($types);
         $arr = [];
        foreach($types as $val){
         if($val->pid==0){
            //证明该分类在分类表里是底层分类, 
            foreach($types as $vall){
                 $res = ProductCates::where('pid', $vall->id)->get();
                  if($res->isempty()){
                        //$arr[] = $val;
                  }else{
                         foreach($res as $valll){
                             foreach($types as $vallll){
                                 $ress = ProductCates::where('pid', $valll->id)->get();
                                 if( $ress->isempty()){
                                    $arr[] = $valll;

                                 }
                             }
                               dd($arr);
                         }
                  }   
            }
            
             
         }
          
                
              
           
          }
         
             
          
   // dd($arr);
    // dd($shuju);
     //查看顶级分类
     $first = ProductCates::select('title','id')->where('pid', 0)->get();
 
        return  view('home.index',['cate_data'=>$cate_data , 'imgs'=>$imgs ,'first'=>$first ,'res'=>$res,'arr'=>$arr]);
    }

    /****-
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
