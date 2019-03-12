<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\OrderList;
class OrderListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $view = new OrderList;

         $date_start = $request->input('date_start',''); 
        $date_end = $request->input('date_end','');
        $search = $request->input('order_code','');
        
       // dump($date_start);
       // dump($date_end);
       //$data = $view->all();
                                   
         if($date_start == '' && $date_end != ''){
            $data = $view->where('created_at','<' ,'date_end')->where('order_code','like','%'.$search.'%')->Paginate(4);
            $num = $view->where('created_at','<' ,'date_end')->where('order_code','like','%'.$search.'%')->count();
         }else if($date_start !='' && $date_end ==''){
            $data = $view->where('created_at', '>' ,'date_start')->where('order_code','like','%'.$search.'%')->Paginate(4);
            $num =  $view->where('created_at', '>' ,'date_start')->where('order_code','like','%'.$search.'%')->count();
         }else if($date_start =='' && $date_end ==''){
            $data = $view->where('order_code','like','%'.$search.'%')->Paginate(4);
            $num = $view->where('order_code','like','%'.$search.'%')->count();
         }else{
            $data = $view->whereBetween('created_at', [$date_start, $date_end])->where('order_code','like','%'.$search.'%')->Paginate(4);
            $num = $view->whereBetween('created_at', [$date_start, $date_end])->where('order_code','like','%'.$search.'%')->count();
         }
        return view('admin.orderlists.index',['data'=>$data ,'search'=>$search , 'date_start'=>$date_start , 'date_end'=>$date_end ,'request'=>$request->all() ,'num'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orderlists.add');
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
        $order = new OrderList;
        $order->uid = $info['uid'];
        $order->gid = $info['gid'];
        $order->aid = $info['aid'];
        $order->buyer_mess = $info['buyer_mess'];
        $order->order_status = $info['order_status'];
        $order->order_code = $info['order_code'];
         $order->price = $info['price'];
        $order->total_price = $info['total_price'];
        $order->nums = $info['nums'];
         $res = $order->save();
      
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
        $info = OrderList::find($id);
        return view('admin.orderlists.edit' ,['info'=>$info] );
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
        $xinxi = OrderList::find($id);
        $xinxi->uid = $info['uid'];
        $xinxi->gid = $info['gid'];
        $xinxi->aid = $info['aid'];
        $xinxi->order_code = $info['order_code'];
        $xinxi->price = $info['price'] ; 
        $xinxi->total_price = $info['total_price'];
        $xinxi->nums = $info['nums']; 
        $xinxi->order_status = $info['order_status'];
        $xinxi->buyer_mess = $info['buyer_mess']; 
        $res = $xinxi->save();     
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = OrderList::find($id)->delete();
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
    

    }

