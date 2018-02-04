<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\sign;

use Illuminate\Support\Facades\Auth;

class SignController extends Controller
{
    //
	public function in(Request $request){
		if($request->ajax()){
			if(Auth::check()){
				$sign = Sign::where('user_id',Auth::id())->first();
				if(empty($sign)){
					$sign = new Sign();
					$sign->user_id = Auth::id();
					$sign->sign_days = 1;
				}else{
					$sign->sign_days += 1;
				}
				$sign->last_sign_time = time();
				$sign->save();

				return [
					'status'=>0,
					'data'=>[
						'signed'=>1,
						'experience'=>5,
						'days'=>1,
						'test1'=> $sign
					]
				];
			}else{
				return [
					'status'=>-1,
					'msg'=>'未登录'
				];
			}
		}
	}
}
