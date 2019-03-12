<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ArticleRat;
  /**
   * 管理文章评论的控制器
   */

class ArticleRatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $article = new ArticleRat;
        $date_start = $request->input('date_start',''); 
        $date_end = $request->input('date_end','');
        $search = $request->input('content','');
        //dump($date_start);
        //dump($date_end);
       
                                   
         if($date_start == '' && $date_end != ''){
            $data = $article->where('created_at','<' ,'date_end')->where('content','like','%'.$search.'%')->Paginate(4);
            $num = $article->where('created_at','<' ,'date_end')->where('content','like','%'.$search.'%')->Paginate(4)->count();
         }else if($date_start !='' && $date_end ==''){
            $data = $article->where('created_at', '>' ,'date_start')->where('content','like','%'.$search.'%')->Paginate(4);
            $num = $article->where('created_at', '>' ,'date_start')->where('content','like','%'.$search.'%')->Paginate(4)->count();
         }else if($date_start=='' && $date_end ==''){
            $data = $article->where('content','like','%'.$search.'%')->Paginate(4);
            $num = $article->where('content','like','%'.$search.'%')->Paginate(4)->count();
         }else{
            $data = $article->whereBetween('created_at', [$date_start, $date_end])->where('content','like','%'.$search.'%')->Paginate(4);
            $num = $article->whereBetween('created_at', [$date_start, $date_end])->where('content','like','%'.$search.'%')->Paginate(4)->count();
         }
        return view('admin.articlerat.index',['data'=>$data,'request'=>$request->all(),'num'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articlerat.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收前台传递过来的数据
        $info = $request->except('_token');
        $art = new ArticleRat;
        $art->content = $info['content'];
        $art->content = $info['content'];
        $art->evaluate_vating = $info['evaluate_vating'];
        $art->user_name = $info['user_name'];
        $res = $art->save();
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
        $info = ArticleRat::find($id);
         return view('admin.articlerat.edit' , ['info'=>$info]);

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
        $xinxi = ArticleRat::find($id);
        $xinxi->user_name = $info['user_name'];
        $xinxi-> evaluate_vating = $info['evaluate_vating'];
        $xinxi->content = $info['content'];
        $res = $xinxi->save();

         if($res){
           $arr =[
                'msg'=>'success',
                'code'=>200
           ];
        }else{
             $arr =[
                'msg'=>'error',
                'code'=>404
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
        $res = ArticleRat::find($id)->delete();
        if($res){
           $arr =[
                'msg'=>'success',
                'code'=>200
           ];
        }else{
             $arr =[
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
              $res = ArticleRat::find($request['keys'][$i])->delete();   
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
