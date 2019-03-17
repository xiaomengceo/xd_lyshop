<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ArticleInfos;
use App\Model\ArticleTypes;
use DB;
class ArticleInfosController extends Controller
{

    public  static function getType(){
        $type = new ArticleTypes;
        $data = $type->select('*',DB::raw("concat(cate_path,',',id)as paths"))->orderBy('paths','asc')->get();
        //dump($data);
         foreach($data as $key=>$val){
          /*统计字符串内指定字符出现 多少次*/
            $n = substr_count($val->cate_path,',');
            //重复使用一个字符
            $str = str_repeat('|-- --' , $n).$val->cate_name;
            $data[$key]->cate_name = $str;
         }
        return $data; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $article = new ArticleInfos;
        $date_start = $request->input('date_start',''); 
        $date_end = $request->input('date_end','');
        $search = $request->input('title','');
        //dump($date_start);
        //dump($date_end);
       
                                   
         if($date_start == '' && $date_end != ''){
            $data = $article->where('created_at','<' ,'date_end')->where('title','like','%'.$search.'%')->Paginate(4);
         }else if($date_start !='' && $date_end ==''){
            $data = $article->where('created_at', '>' ,'date_start')->where('title','like','%'.$search.'%')->Paginate(4);
         }else if($date_start=='' && $date_end ==''){
            $data = $article->where('title','like','%'.$search.'%')->Paginate(4);
         }else{
            $data = $article->whereBetween('created_at', [$date_start, $date_end])->where('title','like','%'.$search.'%')->Paginate(4);
         }
        $data = $article->where('title','like','%'.$search.'%')->Paginate(4);
        $num = $article->count();
        return view('admin.articles.index' ,['data'=>$data ,'request'=>$request->all() , 'num'=>$num,'search'=>$search] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.articles.add',['data'=>self::getType()]);
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(111111);
        $info = $request->except('_token');
        $article = new ArticleInfos;
        $article->title = $info['title'];
        $article->auth = $info['auth'];
        $article->source = $info['source'];
        $article->category = $info['category'];
       $article->content = $info['content'];
        $article->recommend = $info['recommend'];
        $article->keywords = $info['keywords'];
       $article->allow = $info['allow'];   
        $res = $article->save();
        if($res){
            dump('添加成功');
            return redirect('admin/articleInfos');
        }else{
             dump('添加成功');
            return redirect('admin/articleInfos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ArticleInfos::find($id);
        $type =new ArticleTypes;
        $info = $type->select('cate_name','id')->get();
       return view('admin.articles.edit',['data'=>$data,'info'=>$info]);
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
     ;
    $article = ArticleInfos::find($id);
       $article->title = $info['title'];
        $article->category = $info['category'];
        $article->auth = $info['auth'];        
        $article->source = $info['source'];  
         $article->content = $info['content'];        
        $article->allow = $info['allow'];  
              
         $article->keywords = $info['keywords'];  
        $article->recommend = $info['recommend'];  
       $res = $article->save();
       if($res){
            dump('修改成功');
            return redirect('/admin/articleInfos');
       }else{
           dump('修改失败');
         return redirect('/admin/articleInfos');
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
         $res = ArticleInfos::find($id)->delete();
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
              $res = ArticleInfos::find($request['keys'][$i])->delete();   
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
