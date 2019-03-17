<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ArticleTypes;
use DB;
class ArticleTypesController extends Controller
{
/**
 * 获取加工分类名称的方法
 */

public  static function getType(Request $request){
    $article = new ArticleTypes;
        $date_start = $request->input('date_start',''); 
        $date_end = $request->input('date_end','');
        $search = $request->input('cate_name','');
       // dump($date_start);
       // dump($date_end);
       //模糊查询
                                   
         if($date_start == '' && $date_end != ''){
            $data = $article->where('created_at','<' ,'date_end')->where('cate_name','like','%'.$search.'%')->select('*',DB::raw("concat(cate_path,',',id)as paths"))->orderBy('paths','asc')->Paginate(4);
            $num = $article->where('created_at','<' ,'date_end')->where('cate_name','like','%'.$search.'%')->select('*',DB::raw("concat(cate_path,',',id)as paths"))->orderBy('paths','asc')->Paginate(4)->count();
         }else if($date_start !='' && $date_end ==''){
            $data = $article->where('created_at', '>' ,'date_start')->where('cate_name','like','%'.$search.'%')->select('*',DB::raw("concat(cate_path,',',id)as paths"))->orderBy('paths','asc')->Paginate(4);
            $num =  $article->where('created_at', '>' ,'date_start')->where('cate_name','like','%'.$search.'%')->select('*',DB::raw("concat(cate_path,',',id)as paths"))->orderBy('paths','asc')->Paginate(4)->count();
         }else if($date_start =='' && $date_end ==''){
            $data = $article->where('cate_name','like','%'.$search.'%')->select('*',DB::raw("concat(cate_path,',',id)as paths"))->orderBy('paths','asc')->Paginate(4);
            $num = $article->where('cate_name','like','%'.$search.'%')->select('*',DB::raw("concat(cate_path,',',id)as paths"))->orderBy('paths','asc')->Paginate(4)->count();
         }else{
            $data = $article->whereBetween('created_at', [$date_start, $date_end])->where('cate_name','like','%'.$search.'%')->select('*',DB::raw("concat(cate_path,',',id)as paths"))->orderBy('paths','asc')->Paginate(4);
            $num = $article->whereBetween('created_at', [$date_start, $date_end])->where('cate_name','like','%'.$search.'%')->select('*',DB::raw("concat(cate_path,',',id)as paths"))->orderBy('paths','asc')->Paginate(4)->count();
         }
       
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
    public  function index(Request $request)
    {     
        $search = $request->input('cate_name',''); 
        $date_start = $request->input('date_start',''); 
        $date_end = $request->input('date_end','');  
        /*不需要这些代码了*/
       /* $article = new articleTypes;
        $search = $request->input('search','');
       // dd($search);
         $data = ArticleTypes::where('cate_name','like','%'.$search.'%')->Paginate(5);*/
       //获取总条数
         $num = ArticleTypes::count();
        return view('admin.articletypes.index',['data'=>self::getType($request),'request'=>$request->   all(),'num'=>$num,'search'=>$search,'date_start'=>$date_start,'date_end'=>$date_end]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $data = ArticleTypes::all();
        return view('admin.articletypes.add' , ['data' =>self::getType($request)] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //提取数据
        $info = $request->except('_token');
        /*处理分类路径*/
        //是否是顶级分类
        if($info['cate_pid'] ==0 ){
            $info['cate_path'] = 0;
        }else{
            //获取父级分类的信息
            $parent_info = ArticleTypes::find($info['cate_pid']);
            //子类的path = 父级的path拼接父级的id
            $info['cate_path'] = $parent_info->cate_path.','.$parent_info->id;
        }
        //开始赋值
        $aritcle = new ArticleTypes;
        $aritcle->cate_name = $info['cate_name'];
        $aritcle->cate_title = $info['cate_title'];
        $aritcle->cate_keywords = $info['cate_keywords'];
        $aritcle->cate_pid = $info['cate_pid'];    
        $aritcle->cate_path = $info['cate_path'];   
        $aritcle->cate_order = $info['cate_order'];  
        $aritcle->cate_descr = $info['cate_descr'];
        $res = $aritcle->save();
        if($res){
            dump('添加分类成功');
            return redirect('/admin/article_types');
        }else{
            dump('添加失败');
            return back();
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
        $data = ArticleTypes::find($id);
       return view('admin.articletypes.edit',['data'=>$data]);
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
        //dump($info);
        //先查询出要修改的单条信息
              
        $aritcle = ArticleTypes::find($id);
        //开始赋值
        $aritcle->cate_name = $info['cate_name'];
        $aritcle->cate_title = $info['cate_title'];
        $aritcle->cate_keywords = $info['cate_keywords'];
        //$aritcle->cate_pid = $info['cate_pid'];    
        //$aritcle->cate_path = $info['cate_path'];   
        $aritcle->cate_order = $info['cate_order'];  
        $aritcle->cate_descr = $info['cate_descr'];
        $res = $aritcle->save();
        if($res){
            dump('修改分类成功');
            return redirect('/admin/article_types');
        }else{
            dump('修改失败');
            return back();
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
        $res =ArticleTypes::find($id)->delete();
        //dd($res);
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
