<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Model\Userinfos;
use App\Model\PhoneCode;
/**
 * 注册模块
 */
class RegisterController extends Controller
{
   /**
    * curl调用短信接口的方法
    */
   public static function juhecurl($url,$params=false,$ispost=0){
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
  
    public function index(){
       return view('home.register.index');
    }

     //发送邮件进行注册
    public function by_email(request $request){
       $data=$request->all();
       dump($data);
       //插入数据库
       $users=new Userinfos;
       $users->email=$data['email'];
       $salt="*$%#@15153qazPLM";
       $users->password=md5($salt.$data['password']);
       $users->token=str_random(60);
       $users->save();

       $title=$data['email'];
       //发送邮件
       Mail::send('home.email.index', ['token'=>$users->token,'id'=>$users->id,'title' => $title], function ($m) use ($data) {
         //$m->from('hello@app.com', 'Your Application');
         $m->to($data['email'])->subject('零食汇邮箱注册');
     });
    }

    //邮件激活完成注册
    public function change_status($id,$token){
       //return  $id;
       $users=Userinfos::find($id);
       if($users==null){
         dd('激活连接已失效1');
       }
       if($users->token!=$token){
         dd('激活连接已失效2');
       }
       $users->token=str_random(60);
       $users->status=1;
       $res=$users->save();
       if($res){
          dd('激活成功,<a href="/home/login/login">点击立即登录</a>');
       }else{
          dd('激活失败');
       }
        
    }
    
    
    //接收手机号并发送验证码
    public function send_phone($phone){
      $code=new PhoneCode;
      //手机号
      $phone = $phone;
      //验证码
      $phone_code = rand(1000,9999);  
      //短信接口的URL
      $sendUrl = 'http://v.juhe.cn/sms/send'; 
      $smsConf = array(
         'key'   => '478e9c3433d614a7dd393139e0beb2ed', //您申请的APPKEY
         'mobile'    => $phone, //接受短信的用户手机号码
         'tpl_id'    => '132406', //您申请的短信模板ID，根据实际情况修改
         'tpl_value' =>'#code#='.$phone_code //您设置的模板变量，根据实际情况修改
      );
      $content =self::juhecurl($sendUrl,$smsConf,1); //请求发送短信
      if($content){
         $result = json_decode($content,true); //转数组
         $error_code = $result['error_code'];
         if($error_code == 0){
            //先删除旧的数据再存
            $res=PhoneCode::where('phone',$phone)->first();
            if($res!=null){
               $res->delete();
            }  
            // 将值存到数据库中
            $code->phone=$phone;
            $code->code=$phone_code;
            $code->save();
            if(1==rand(1,1000)){
               $time=date("Y-m-d H:i:s",time()-1800);
               $res=PhoneCode::where('created_at', '<',$time )->delete(); 
            }
            //状态为0，说明短信发送成功
            $arr = [
                  'code'=>0,
                  'msg'=>"短信发送成功,短信ID：".$result['result']['sid'],
            ];
            echo json_encode($arr);
         }else{
            //状态非0，说明失败
            $msg = $result['reason'];
            $arr = [
                  'code'=>$error_code,
                  'msg'=>"短信发送失败(".$error_code.")：".$msg,
            ];
            echo json_encode($arr);
         }
      }else{
         //返回内容异常，以下可根据业务逻辑自行修改
         $arr = [
            'code'=>'',
            'msg'=>'请求发送短信失败',
         ];
         echo json_encode($arr);
      }
      
    }

    //提交手机号注册用户完成注册
    public function by_phone(request $request){
      $data=$request->except("_token");
      $users=new Userinfos;
      $code=PhoneCode::where('phone',$data['phone'])->first();
      if($code!=null){
        if($code->code==$data['code']){
           $users->telephone=$data['phone'];
           $salt="*$%#@15153qazPLM";
           $users->password=md5($salt.$data['password']);
           $res=$users->save();
           if($res){
            $code->delete();
            echo('注册成功,'.'<a href="/home/login/login">点击立即登录</a>');
            dd();
           } 
        }else{
         echo('验证码有误'.'<a href="">6666</a>');
         dd();
        }
      }else{
         echo('验证码有误'.'<a href="">6666</a>');
         dd();
      }
      
      
    }
}
