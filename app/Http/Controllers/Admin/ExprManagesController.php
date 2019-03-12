<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ExprManages;
/**
 * 加载物流公司信息管理模块的类
 */

class ExprManagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $article = new ExprManages;
        $date_start = $request->input('date_start',''); 
        $date_end = $request->input('date_end','');
        $search = $request->input('name','');
       // dump($date_start);
       // dump($date_end);
       
                                   
         if($date_start == '' && $date_end != ''){
            $data = $article->where('created_at','<' ,'date_end')->where('name','like','%'.$search.'%')->Paginate(4);
            $num = $article->where('created_at','<' ,'date_end')->where('name','like','%'.$search.'%')->count();
         }else if($date_start !='' && $date_end ==''){
            $data = $article->where('created_at', '>' ,'date_start')->where('name','like','%'.$search.'%')->Paginate(4);
            $num =  $article->where('created_at', '>' ,'date_start')->where('name','like','%'.$search.'%')->count();
         }else if($date_start =='' && $date_end ==''){
            $data = $article->where('name','like','%'.$search.'%')->Paginate(4);
            $num = $article->where('name','like','%'.$search.'%')->count();
         }else{
            $data = $article->whereBetween('created_at', [$date_start, $date_end])->where('name','like','%'.$search.'%')->Paginate(4);
            $num = $article->whereBetween('created_at', [$date_start, $date_end])->where('name','like','%'.$search.'%')->count();
         }

        return view('/admin/exprmanages.index' , ['data'=>$data,'num'=>$num,'search'=>$search,'request'=>$request->all(),'date_start'=>$date_start,'date_end'=>$date_end]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $info = ExprManages::all();
       return view('/admin/exprmanages.add',['info'=>$info]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $info = $request->except('_token');
        $expr = new ExprManages;
        $expr->name = $info['name'];
        $expr->logo = $info['brand-logo'];
        $expr->descr = $info['descr'];
        $expr->status = $info['status'];
        $expr->expr_code = $info['expr_code'];
        $res = $expr->save();
      
        if($res){
            $arr = [
                'msg'=>'success',
                'code'=>200
            ];
        }else{
              $arr = [
                'msg'=>'error',
                'code'=>$st
            ];
        }
        echo json_encode($arr);

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
        $info = ExprManages::find($id);
      return view('/admin/exprmanages.edit',['info'=>$info]); 
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
       $info = ExprManages::find($id);
       $stmt =$request->except('_token','_method');
       $info->name = $stmt['name'];
       $info->status = $stmt['status'];
       $info->expr_code = $stmt['expr_code'];
       $info->descr = $stmt['descr'];
       $info->logo = $stmt['brand-logo'];
       $res = $info->save();
       if($res){
            $arr = [
                'msg'=>'success',
                'path'=>$res
            ];
       }else{
            $arr = [
                'msg'=>'error',
                'path'=>''
            ];
       }
       echo json_encode($arr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res =ExprManages::find($id)->delete();
       if($res){
                $data = [
                    'msg'=>'success',
                    'code'=>200
                ];
            }else{
                $data = [
                    'msg'=>'error',
                    'code'=>404
                ];
            }
            echo json_encode($data);
    }

    /**
     * [upload description]  上传文件的方法
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    

    public function upload(Request $request)
    {
        if($request->hasFile('logo')){
            //创建文件上传对象
            $file = $request->file('logo');
            $res = $file->store('public');
            if($res){
                $data = [
                    'msg'=>'success',
                    'path'=>$res
                ];
            }else{
                $data = [
                    'msg'=>'error',
                    'path'=>''
                ];
            }
            echo json_encode($data);
        }else{
            dump('给我图片,号码');
            return back();
        }
    }

    /**
     *加载批量删除的方法
     * 
     */
    
    public function delall(Request $request)
    {
        for ($i=0; $i<count($request['keys']); $i++) {
              // 遍历删除
              $res = ExprManages::find($request['keys'][$i])->delete();   
        }           
        //$res=1;
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
