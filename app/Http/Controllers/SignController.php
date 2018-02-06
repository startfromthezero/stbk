<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\sign;
use App\Score;
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
					if ($sign->last_sign_time < strtotime(date('Ymd', strtotime('-1 day')))){
						$sign->sign_days = 0;
					}
					$sign->sign_days += 1;
				}
				$sign->last_sign_time = time(0);
				$sign->save();
				if($sign->sign_days < 5){
					$score = 5;
				}elseif($sign->sign_days >=5 && $sign->sign_days < 15){
					$score = 10;
				}elseif($sign->sign_days >=15 && $sign->sign_days < 30){
					$score = 15;
				}elseif($sign->sign_days >=30 && $sign->sign_days < 100){
					$score = 20;
				}elseif($sign->sign_days >=100 && $sign->sign_days <365){
					$score = 30;
				}else{
					$score = 50;
				}
				$userScore = Score::where('user_id', Auth::id())->first();
				if(empty($userScore)){
					$userScore = new Score();
					$userScore->score = $score;
				}else{
					$userScore->score += $score;
				}
				$userScore->user_id = Auth::id();
				$userScore->save();

				return [
					'status'=>0,
					'data'=>[
						'signed'=>1,
						'experience'=> $score,
						'days'=> $sign->sign_days,
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
