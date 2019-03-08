<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\ProductBrand;
/**
 * 商品品牌
 */
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=ProductBrand::all(); 
        return view('admin.brand.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }
    
    //图片上传
    public function upload(Request $request){
        //$data=$request->all();
         
        //执行文件上传
       if($request->hasFile('img')){
          $file_name=$request->file('img')->store('images');
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');
        $obj=new ProductBrand; 
        $obj->title=$data['title'];
        $obj->logo=$data['logo'];
        $obj->descr=$data['descr'];
        $obj->order=$data['order'];
        $res=$obj->save();
        if ($res) {
            $data = [
                'status' => 1,
                'msg' => '添加成功',
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
         
        $data=ProductBrand::find($id);
        return view('admin.brand.edit',['data'=>$data]);
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
        // $data=$request->except('_token');
        // $res=ProductBrand::where('id',$id)->update($data);
       
    }

    public function up(Request $request, $id){
        $data=$request->except('_token');
        //$res=ProductBrand::where('id',$id)->update($data);
        $obj=ProductBrand::find($id);
        $obj->title=$data['title'];
        $obj->logo=$data['logo'];
        $obj->descr=$data['descr'];
        $obj->order=$data['order'];
        $res=$obj->save();
        if ($res) {
            $data = [
                'status' => 1,
                'msg' => '修改成功',
                
            ];
        }else{
            $data = [
                'status' => 0,
                'msg' => '修改失败'
            ];
        }
        $data=json_encode($data);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res =ProductBrand::find($id)->delete();
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

    /**
     * 批量删除
     */
    public function delall(Request $request)
    {
        for ($i=0; $i<count($request['keys']); $i++) {
              // 遍历删除
              $res =ProductBrand::find($request['keys'][$i])->delete();   
        }
        $res=1;
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
}
