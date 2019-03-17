<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FriendLinks;
class FriendLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {  
        $friend = new FriendLinks;
     /*   获取搜索的数据*/
         $date_start = $request->input('date_start');    
          $date_end = $request->input('date_end');  
         $search = $request->input('links_name');  
         if($date_start == '' && $date_end != ''){
            $data = $friend->where('created_at','<' ,'date_end')->where('links_name','like','%'.$search.'%')->Paginate(4);
            $num = $friend->where('created_at','<' ,'date_end')->where('links_name','like','%'.$search.'%')->Paginate(4)->count();
         }else if($date_start !='' && $date_end ==''){
            $data = $friend->where('created_at', '>' ,'date_start')->where('links_name','like','%'.$search.'%')->Paginate(4);
            $num =  $friend->where('created_at', '>' ,'date_start')->where('links_name','like','%'.$search.'%')->Paginate(4)->count();
         }else if($date_start=='' && $date_end ==''){
            $data = $friend->where('links_name','like','%'.$search.'%')->Paginate(4);
            $num = $friend->where('links_name','like','%'.$search.'%')->Paginate(4)->count();
         }else{
            $data = $friend->whereBetween('created_at', [$date_start, $date_end])->where('links_name','like','%'.$search.'%')->Paginate(4);
            $num = $friend->whereBetween('created_at', [$date_start, $date_end])->where('links_name','like','%'.$search.'%')->Paginate(4)->count();
         }
        //$data = $article->where('brand_name','like','%'.$search.'%')->Paginate(4);
        //$num = $article->count();
        return view('admin.friendlinks.index' ,['data'=>$data ,'request'=>$request->all() , 'num'=>$num,'search'=>$search,'date_start'=>$date_start,'date_end'=>$date_end] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.friendlinks.add');
     }     
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $st = '进来了';
       $info = $request->except('_token');
       $friend = new FriendLinks;
       $friend->links_name = $info['links_name'];
        $friend->path = $info['path'];
         $friend->display = $info['display'];
          $friend->logo = $info['logo-hid'];
          $res = $friend->save();
           if($res){
           $arr = [
               'msg'=>'success',
               'path'=> $res

            ];
        }else{
            $arr = [
                'msg'=>'error',
                'path'=>$res,
                 'st'=>$st
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
        $data = FriendLinks::find($id);
        return view('admin.friendlinks.edit',['data'=>$data]);
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
        $info = $request->except('_token','_method');
        $friend = FriendLinks::find($id);
        $friend->links_name = $info['links_name'];
        $friend->path = $info['path'];
         $friend->display = $info['display'];
          $friend->logo = $info['logo-hid'];
          $res =$friend->save();
          if($res){
                dump('修改成功');
          }else{
                dump('修改失败');
          }
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
         $res = FriendLinks::find($id)->delete();
        
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
     * 加载上传文件的方法
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function upload1(Request $request){

       // $st = 'upload';
       // exit(11111);
 /*    if ($request->hasFile('brand_logo')) {
                $file = $request->file('brand_logo');//创建文件上传对象
                $res = $file->store('public');//上传到指定的文件夹*/
    if($request->hasFile('logo')){
        $file = $request->file('logo');  //创建文件上传对象
        $res = $file->store('public'); //执行文件上传
        if($res){
            $arr = [
               'msg'=>'success',
               'path'=> $res

            ];
        }else{
            $arr = [
                'msg'=>'error',
                'path'=>$res,
                 'st'=>$st
            ];
        }
        echo json_encode($arr);
    }else{
        
        //dump('给我图片');
        $arr = [
                'msg'=>'error',
                'path'=>$res,
                 'st'=>$st
            ];
           echo  json_encode($arr);
    }
}

/**
 * 加载批量删除的方法
 */

public function delall(Request $request)
    {
        for ($i=0; $i<count($request['keys']); $i++) {
              // 遍历删除
              $res = FriendLinks::find($request['keys'][$i])->delete();   
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