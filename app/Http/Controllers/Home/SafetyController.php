<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Home\Informat;
use Mail;
/**
 * 加载用户中心安全模块的控制器
 * 
 */

    
class SafetyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = 2;
       // return view('home.safety.index', ['id'=>$id]);
         return view('home.layout.show',['id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = 2;
      return view('home.safety.email',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *加载验证手机验证码的方法
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $info = $request->except('_token');
      //dump($info['code']);
    
      dump(session('code'));
      if(!$info['code'] == session('code')){
        dump('验证码不正确');
      }
      //将该手机号存放到数据库中
     
     $id= 2;
     $xinxi = Informat::find($id);
     $xinxi->telephone = $info['telephone'];
     $res = $xinxi->save();
     if($res){
            dump('恭喜主公手机号验证成功');
        //return redirect('/home/safety');
     }else{
           dump('手机号验证失败');
       // return back();
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
    
        // return view('home.safety.phone');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
         
          return view('home.safety.password' ,['id'=>$id]);
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
        $this->validate($request, [
            'user_old-password' => 'required',
            'user_new-password' => 'required',
            'repass' => 'required|',
        ],[
            'user_old-password.required' => '原始密码必填',
            'user_new-password.required' => '新密码必填',
            'repass.required' => '确认密码不能为空',
            
        ]);

          $info = $request->except('_token','_method');
        if($info['user_new-password'] != $info['repass']){
            dump('确认密码和新密码输入不一致');
            return back();
        }
        $id = 2;
    
     // dump($info);
      $xinxi = Informat::find($id);
        $salt="！@#%&&adadsiikkkl";
        $xinxi->password = md5( $info['user_new-password']. $salt);
        $res = $xinxi->save();
        if($res){
            dump('恭喜您密码修改成功');
            return redirect('/home/safety');
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
       
    }

    /**
     * 加载发送邮件的方法
     */
    
    public function SendMail(){
   
        $send = '这是我第一次给你发送邮件,请珍惜,并激活它!';
        $code = mt_rand(1111,9999);
        Mail::send('home.safety.send',['send'=>$send,'code'=>$code], function($m) use($code){
        if($m->to('1427560573@qq.com')->subject('Your Email !')){
            session(['codes'=>$code]);
           // dump(session());
            $data = [
                'msg'=>'success',
                'code'=>session('codes')
            ];
        }else{
            $data = [
                'msg'=>'error',
                'code'=>404
            ];
        }
        echo json_encode($data);

        });
      
   
    }

    /**
     * 加载校邮箱验验证码的方法
     */
    
    public function ShowCode(Request $request ){
        $id = 2;
    $info = $request->except('_token');


    //$info->code 这种写法是严重错误的.应该写成$info['code']  ;
    
    if($info['code'] == session('codes')){
        $xinxi = Informat::find($id);
        $xinxi->email = $info['email'];
      $res = $xinxi->save();
        if($res){
            dump('恭喜主公邮箱验证成功');
            return redirect('/home/safety');
        }else{
            dump('箱验证失败');
            return back();
        }
      }
  }



  /**
   * 加载显示验证手机页面的方法
   */

    public function ShowPhone(){
        //dd(11111);
        return view('home.safety.phone');
    }

    /**
     *
     * 执行发送手机的方法
     */

    public function DoSend(){
       /*
    ***聚合数据（JUHE.CN）短信API服务接口PHP请求示例源码
    ***DATE:2015-05-25
*/
header('content-type:text/html;charset=utf-8');
      
    $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
    /*接收从表单传递过来的手机号*/
      $phone =$_GET['telephone'];
    //  var_dump($phone);exit;
      /*生成4位随机数*/
      $code = mt_rand(1000,9999);
    $smsConf = array(
        'key'   => '528950abe7196f7c851cdcda94717052', //您申请的APPKEY
        'mobile'    => $phone, //接受短信的用户手机号码
        'tpl_id'    => '142667', //您申请的短信模板ID，根据实际情况修改
        'tpl_value' =>'#code#='.$code //您设置的模板变量，根据实际情况修改
    );
 
$content =$this->juhecurl($sendUrl,$smsConf,1); //请求发送短信
  // var_dump($content);
if($content){
    $result = json_decode($content,true);
    $error_code = $result['error_code'];
    if($error_code == 0){
        //状态为0，说明短信发送成功
        echo "短信发送成功,短信ID：".$result['result']['sid'];
    }else{
        //状态非0，说明失败
        $msg = $result['reason'];
        echo "短信发送失败(".$error_code.")：".$msg;
    }
}else{
    //返回内容异常，以下可根据业务逻辑自行修改
    echo "请求发送短信失败";
}
    /*调用juhecurl方法来执行发送短信*/
        $this->juhecurl();

    /*将验证码存放到session中*/
    session(['code'=>$code]);
    dump(session('code'));
}


    /**
 * 请求接口返回内容
 * @param  string $url [请求的URL地址]
 * @param  string $params [请求的参数]
 * @param  int $ipost [是否采用POST形式]
 * @return  string
 */
function juhecurl($url,$params=false,$ispost=0){
    $httpInfo = array();
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
    curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
    curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
    if( $ispost )
    {
        curl_setopt( $ch , CURLOPT_POST , true );
        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
        curl_setopt( $ch , CURLOPT_URL , $url );
    }
    else
    {
        if($params){
            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
        }else{
            curl_setopt( $ch , CURLOPT_URL , $url);
        }
    }
    $response = curl_exec( $ch );
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
    curl_close( $ch );
    return $response;
}


 }   