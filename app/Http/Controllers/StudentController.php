<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\session;

class StudentController extends Controller
{
	public function session1(Request $request){
		//1、http request session()
		//$request->session()->put('key1','val1');

		//2、session()
		//session()->put('key2','val2');

		//3、
		//Session::put('key3','val3');

		//Session::put(['key4' => 'val4']);

		//把数据放到session数组中
		//Session::push('student','tongshao');
		//Session::push('student','imoc');
		//Session::flash('key-flash','val-falsh'); //只有第一次获取时返回值

	}

	public function session2(Request $request){
		//echo Session::get('key-flash');
		//echo $request->session()->get('key1');
		//echo session()->get('key2');
		//echo Session::get('key4','default');
		//取出数据并删除
//		$res = Session::pull('student','default');
//		var_dump($res);
//		if(Session::has('key1')){
//			dd(Session::all());//取出所有session
//		}else{
//			echo '你们来到不再';
//		}
	//	Session::forget('key1');//删除session中指定的key值
		//Session::flush(); //删除session所有的值
		return Session::get('message','暂无信息');
	}

	public function request1(Request $request){
		//echo $request->input('name','默认'); //获取URL的值
//		if($request->has('name')){
//			echo $request->input('name');
//		}else{
//			echo 'no';
//		}
//		$res = $request->all(); //获取URL所有指并返回数组
//		dd($res);
		//echo $request->method();

//		if($request->isMethod('POST')){
//			echo $request->method();
//		}else{
//			echo 'no';
//		}
//		$request->ajax(); //判断是否为ajax，是则返回true,否则false;
//		$res = $request->is('request1');
//		var_dump($res);
//
//		echo $request->url();//获取当前的URL
	}

	public function response(){
		$data =[
			'errCode'=>0,
			'errMsg'=>'success',
			'data'=>'shaotong'
		];
		//return response()->json($data); //返回json数据

		//重定向
		//return redirect('session2')->with('message','我就是牛逼');

		//return redirect()->action('StudentController@session2')->with('message', '我就是牛逼');

		//return redirect()->route('omy')->with('message', '我就是牛逼');

		//return redirect()->back(); 返回上一页
	}

	public function upload(Request $request){
		if($request->isMethod('POST')){
			//dd($_FILES);
			$file = $request->file('source');
			//是否上传成功
			if($file->isValid()){
				//原文件名
				$originalName = $file->getClientOriginalName();
				//扩展名
				$ext = $file->getClientOriginalExtension();
				//MimeType
				$type = $file->getClientMimeType();
				//文件临时绝对路径
				$realPath = $file->getRealPath();

				$fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;

				$boot = Storage::disk('public')->put($fileName,file_get_contents($realPath));

				var_dump($boot);
			}
			exit();
		}
		return view('student.upload');
	}

	public function mail(){
		Mail::raw("爱你哦",function($message){
			$message->from('v_shtzhu@163.com','一个帅得一塌糊涂的男人');
			$message->subject('我只想跟你说三国字','测试');
			$message->to('359976215@qq.com');
		});
		//return view('student.mail');
//		Mail::send('student.mail',['name'=>''],function($message){
//			$message->to('359976215@qq.com');
//		});
	}

	public function cache1(){
		//Cache::put('key2','val2',10);
		//$bool = Cache::add('key3','val3',10); //添加缓存
		//Cache::forever('key4','val4');
		//var_dump($bool);
//		if(Cache::has('key5')){
//			echo Cache::get('key5');
//		}else{
//			echo 'no';
//		}
	}

	public function cache2(){
//		$val = Cache::get('key4');
//		var_dump($val);
//		$val = Cache::pull('key1');
//		var_dump($val);
		$bool = Cache::forget('key2');
		var_dump($bool);
	}

	public function error(){
		//$name ="test";
		//var_dump($name);

//vendor\laravel\framework\src\Illuminate\Foundation\Exceptions\views
//		abort(404); //未找到页面
//		abort(419); //认证超时
//		abort(429); //过多请求
//		abort(500);// 服务器出错
//		abort(503);//拒绝客服端的链接
		//abort('layout');
		//Log::info('这是一个info的日志');
		//Log::warning('这是一个warning的日志');
		//Log::error('这是一个数组',['name'=>'shaotong','age'=>'29']);
	}

	public function queue(){
		//数据库队列步骤
		//1、修改.env 的QUEUE_DRIVER 为 database；
		//2、执行php artisan queue:table
		//3、执行php artisan migrate
		//4、执行php artisan make:job SendEmail //创建一个任务类
		//5、执行php artisan listen //监听列队
		//6、执行php artisan queue:failed-table //创建一个失败队列表
		//7、执行php artisan queue:failed //查看错误队列信息
		//8、执行php artisan queue:retry 1(all) //将错误队列第一条重新执行,为all时则全部重新执行
		//9、执行php artisan queue:forget 4 //删除第四条错误队列
		//10、执行php artisan queue:flush  //删除所有错误队列
		dispatch(new SendEmail('359976215@qq.com'));
		//Log::info('这是一个info的日志');
	}

	public function activity0(){
		return '活动快要开始，敬请期待！';
	}

	public function activity1(){
		return '活动进行中，谢谢您的参与1';
	}

	public function activity2(){
		return '活动进行中，谢谢您的参与2';
	}
}
