<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Home\Address;

/**
 * 加载管理收货地址模块的增删改查
 */
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Address::all();
        return view('home.address.index',['info'=>$info]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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
         $xinxi =new Address;
        $xinxi->uname = $info['uname'];
        $xinxi->phone = $info['phone'];
        $xinxi->detail_addr = $info['detail_addr'];
        $xinxi->cmbCity = $info['cmbCity'];
        /*$xinxi->cmbStreet = $info['cmbStreet'];*/
        $xinxi->cmbArea = $info['cmbArea'];
        $xinxi->cmbProvince = $info['cmbProvince'];
       // $xinxi->default = $info['default'];
        $res = $xinxi->save();

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
        $info = Address::find($id);

        return view('home.address.edit',['info'=>$info]);
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
        if($info['default'] == 1){
            //查询出之前设置为默认地址的那条数据,将default值改为0
            $def = Address::where('default','=',1)->first();
            $def->default = 0;
             $result  = $def->save();

        }

        $xinxi = Address::find($id);
        $xinxi->uname = $info['uname'];
        $xinxi->phone = $info['phone'];
        $xinxi->detail_addr = $info['detail_addr'];
        $xinxi->cmbCity = $info['cmbCity'];
        /*$xinxi->cmbStreet = $info['cmbStreet'];*/
        $xinxi->cmbArea = $info['cmbArea'];
        $xinxi->cmbProvince = $info['cmbProvince'];
        $xinxi->default = $info['default'];
        $res = $xinxi->save();

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Address::find($id)->delete();
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
}
