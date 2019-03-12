<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ViewPagers;
use App\Model\ViewpCates;
/**
 * 加载轮播图分类信息的方法
 */

class ViewPagersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $view = new ViewPagers;
        $date_start = $request->input('date_start',''); 
        $date_end = $request->input('date_end','');
        $search = $request->input('title','');
       // dump($date_start);
       // dump($date_end);
       
                                   
         if($date_start == '' && $date_end != ''){
            $data = $view->where('created_at','<' ,'date_end')->where('title','like','%'.$search.'%')->Paginate(4);
            $num = $view->where('created_at','<' ,'date_end')->where('title','like','%'.$search.'%')->count();
         }else if($date_start !='' && $date_end ==''){
            $data = $view->where('created_at', '>' ,'date_start')->where('title','like','%'.$search.'%')->Paginate(4);
            $num =  $view->where('created_at', '>' ,'date_start')->where('title','like','%'.$search.'%')->count();
         }else if($date_start =='' && $date_end ==''){
            $data = $view->where('title','like','%'.$search.'%')->Paginate(4);
            $num = $view->where('title','like','%'.$search.'%')->count();
         }else{
            $data = $view->whereBetween('created_at', [$date_start, $date_end])->where('title','like','%'.$search.'%')->Paginate(4);
            $num = $view->whereBetween('created_at', [$date_start, $date_end])->where('title','like','%'.$search.'%')->count();
         }
      

        return view('admin.viewpagers.index' , ['data'=>$data,'request'=>$request->all(),'num'=>$num,'date_start'=>$date_start,'date_end'=>$date_end,'search'=>$search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = ViewpCates::select('category','id')->get();
   // dd($info);
  
         return view('admin.viewpagers.add',['info'=>$info]);
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
       $view = new ViewPagers;
        $view->title = $info['title'];
        $view->pictures = $info['pic'];
         $view->cate_id = $info['cate_id'];
        $res = $view->save();
        if($res){
            $arr = [
                'msg'=>'success',
                'code'=>200
            ];
        }else{
              $arr = [
                'msg'=>'error',
                'code'=>404
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
        $info = ViewPagers::find($id);
        $stmt = ViewpCates::select('category','id')->get();
         return view('admin.viewpagers.edit',['info'=>$info,'stmt'=>$stmt]);
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
        $st = '人民';
        $info = $request->except('_token','_method');
        $view = ViewPagers::find($id);
        $view->title = $info['title'];
        //$info['pic']中的pic 为 前台input type=file 的name值
        $view->pictures = $info['pic'];
         $view->cate_id = $info['cate_id'];
         $res = $view->save();
           if ($res) {
            $data = [
                'status' => 0,
                'msg' => '修改成功'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => $st
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
        $res = ViewPagers::find($id)->delete();
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
     * 加载上传图片的方法
     */
    
    public function upload(Request $request)
    {
        if($request->hasFile('pictures')){
            //创建文件上传对象
            $file = $request->file('pictures');
            $res = $file->store('public');
            if($res){
                $data = [
                    'msg'=>'success',
                    'path'=>$res
                ];
            }else{
                $data = [
                    'msg'=>'error',
                    'path'=>$res
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
              $res = ViewPagers::find($request['keys'][$i])->delete();   
        }
        $res=1;
        if ($res){
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
