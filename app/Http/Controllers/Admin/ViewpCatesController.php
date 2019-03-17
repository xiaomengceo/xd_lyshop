<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ViewpCates;

class ViewpCatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $view = new ViewpCates;
        $date_start = $request->input('date_start',''); 
        $date_end = $request->input('date_end','');
        $search = $request->input('category','');
       // dump($date_start);
       // dump($date_end);
       
                                   
         if($date_start == '' && $date_end != ''){
            $data = $view->where('created_at','<' ,'date_end')->where('category','like','%'.$search.'%')->Paginate(4);
            $num = $view->where('created_at','<' ,'date_end')->where('category','like','%'.$search.'%')->count();
         }else if($date_start !='' && $date_end ==''){
            $data = $view->where('created_at', '>' ,'date_start')->where('category','like','%'.$search.'%')->Paginate(4);
            $num =  $view->where('created_at', '>' ,'date_start')->where('category','like','%'.$search.'%')->count();
         }else if($date_start =='' && $date_end ==''){
            $data = $view->where('category','like','%'.$search.'%')->Paginate(4);
            $num = $view->where('category','like','%'.$search.'%')->count();
         }else{
            $data = $view->whereBetween('created_at', [$date_start, $date_end])->where('category','like','%'.$search.'%')->Paginate(4);
            $num = $view->whereBetween('created_at', [$date_start, $date_end])->where('category','like','%'.$search.'%')->count();
         }
         return view('admin.viewpcates.index',['data'=>$data , 'date_start'=>$date_start , 'date_end'=>$date_end , 'num'=>$num,'request'=>$request->all(),'search'=>$search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.viewpcates.add');
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
       $view = new ViewpCates;
        $view->category = $info['category'];
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
        $info = ViewpCates::find($id);

        return view('admin.viewpcates.edit',['info'=>$info]);
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
        
        /*通过id查询出要修改的那条数据*/
         $view = new ViewpCates;
        $xinxi =  $view->find($id);
         $xinxi ->category = $info['category'];
        
         $res = $xinxi->save();
        if($res){
            $arr = [
                'msg'=>'success',
                'code'=>'200'
            ];
        }else{
            $arr = [
                'msg'=>'success',
                 'code'=>'404'
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
        $res = ViewpCates::find($id)->delete();
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
 * 加载批量删除的方法
 */

public function delall(Request $request)
    {
        for ($i=0; $i<count($request['keys']); $i++) {
              // 遍历删除
              $res = ViewpCates::find($request['keys'][$i])->delete();   
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