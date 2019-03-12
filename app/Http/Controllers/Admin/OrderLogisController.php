<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\OrderLogis;
/*管理订单物流模块的类*/

class OrderLogisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $friend = new OrderLogis;
     /*   获取搜索的数据*/
        $date_start = $request->input('date_start');    
          $date_end = $request->input('date_end');  
         $search = $request->input('logistics_name');  
         if($date_start == '' && $date_end != ''){
            $data = $friend->where('created_at','<' ,'date_end')->where('logistics_name','like','%'.$search.'%')->Paginate(4);
            $num = $friend->where('created_at','<' ,'date_end')->where('logistics_name','like','%'.$search.'%')->get()->count();
         }else if($date_start !='' && $date_end ==''){
            $data = $friend->where('created_at', '>' ,'date_start')->where('logistics_name','like','%'.$search.'%')->Paginate(4);
            $num =  $friend->where('created_at', '>' ,'date_start')->where('logistics_name','like','%'.$search.'%')->get()->count();
         }else if($date_start=='' && $date_end ==''){
            $data = $friend->where('logistics_name','like','%'.$search.'%')->Paginate(4);
            $num = $friend->where('logistics_name','like','%'.$search.'%')->get()->count();
         }else{
            $data = $friend->whereBetween('created_at', [$date_start, $date_end])->where('logistics_name','like','%'.$search.'%')->Paginate(4);
            $num = $friend->whereBetween('created_at', [$date_start, $date_end])->where('logistics_name','like','%'.$search.'%')->get()->count();
         }

      
        return view('admin.orderlogistics.index',['data'=>$data , 'request'=>$request->all() , 'num'=>$num ,'search'=>$search , 'date_start'=>$date_start ,'date_end'=>$date_end ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.orderlogistics.add');

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
       $order = new OrderLogis;
       $order->logistics_name = $info['logistics_name'];
       $order->telephone = $info['telephone'];
       $order->phone = $info['phone'];
        //保存修改的数据
       $res = $order->save();
        if($res){
           $arr = [
               'msg'=>'success',
               'path'=> $res

            ];
        }else{
            $arr = [
                'msg'=>'error',
                'path'=>$res
                 
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
        $info =OrderLogis::find($id);

        return view('admin.orderlogistics.edit' , ['info'=>$info]);
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
        $order = OrderLogis::find($id);
        $order->logistics_name = $info['logistics_name'];
        $order->phone = $info['phone'];
        $order->telephone = $info['telephone'];
        $order->order_code = $info['order_code'];
          $res =$order->save();
        if($res){
               $arr = [
                    'msg'=>'success',
                    'code'=>'200'
               ];
        }else{
              $arr = [
                    'msg'=>'error',
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
        $res = OrderLogis::find($id)->delete();
        if($res){
            $arr=[
                'msg'=>'success'  ,
                'code'=>'200'
            ];
        }else{
            $arr=[
                'msg'=>'success'  ,
                'code'=>'200'
            ];
        }
        echo json_encode($arr);
    }

/*加载批量删除的方法*/ 
   public function delall(Request $request)
    {
        for ($i=0; $i<count($request['keys']); $i++) {
              // 遍历删除
              $res = OrderLogis::find($request['keys'][$i])->delete();   
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
