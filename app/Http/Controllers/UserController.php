<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin\News;
use App\user;
use App\Favorite;

class UserController extends Controller
{
	public function index()
	{
		return view('user.register');
	}

	public function create(Request $request){
		$this->validate($request, [
			'email'    => 'required|email|unique:users',
			'name'     => 'required|unique:users',
			'password' => 'required|alpha_num|between:6,12|confirmed'
		]);
	}

	public function post(){
		$myFavorites = Auth::user()->favorites;
		$where = ['user_id'=> Auth::id(),'from'=>2];
		$news = News::where($where)->get();
		$data =[
			'myFavorites'=> $myFavorites,
			'news'		 => $news,
			'count'      => Favorite::where('user_id', Auth::id())->count(),
			'mycount'    => News::where($where)->count()
		];
		return view('user/post', $data);
	}

	public function qqlogin(Request $request){
		if($request->ajax()){
			$search=[
				'openid'=> $request->openid,
				'accesstoken'=> $request->accesstoken
			];
			$insert=[
				'name'=> $request->name,
				'img'=> $request->img,
				'openid'      => $request->openid,
				'accesstoken' => $request->accesstoken
			];
			$login_user = User::updateOrCreate($search, $insert);
			Auth::loginUsingId($login_user->id);
			return [
				'status' => 0,
				'test'=> $request
			];
		}
	}
}
