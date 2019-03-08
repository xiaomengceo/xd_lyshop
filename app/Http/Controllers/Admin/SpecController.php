<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PropertyName;
/**
 * 商品规格管理
 */
class SpecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=PropertyName::all();
        foreach($data as $k=>$v){
            $data[$k]['p']=json_decode($v->properties);
        }
        return view('admin.spec.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spec.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas=$request->all();
        $obj=new PropertyName;
        $name=$datas['name'];
        $arr=[];
        foreach($name as $k=>$v){
           $arr[$k]["name"]=$v; 
           $arr[$k]["value"]=$datas['value'][$k];
        }
        //处理中文乱码问题JSON_UNESCAPED_UNICODE
        $json=json_encode($arr,JSON_UNESCAPED_UNICODE);
        $obj->title=$datas['title'];
        $obj->properties=$json;
        $obj->descr=$datas['descr'];
        $res=$obj->save();
        $res=1;
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
        $data=PropertyName::find($id);
        $data['properties']=json_decode($data['properties']);
        return view('admin.spec.edit',['data'=>$data]);
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
        $datas=$request->except('_token');
        $obj=PropertyName::find($id);
        $name=$datas['name'];
        $arr=[];
        foreach($name as $k=>$v){
           $arr[$k]["name"]=$v; 
           $arr[$k]["value"]=$datas['value'][$k];
        }
        //处理中文乱码问题JSON_UNESCAPED_UNICODE
        $json=json_encode($arr,JSON_UNESCAPED_UNICODE);
        $obj->title=$datas['title'];
        $obj->properties=$json;
        $obj->descr=$datas['descr'];
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
        $res =PropertyName::find($id)->delete();
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
              $res =PropertyName::find($request['keys'][$i])->delete();   
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
