<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin\News;
use App\user;
use App\Favorite;
use Laravel\Socialite\Facades\Socialite;

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

	public function qqlogin(){
		return Socialite::with('qq')->redirect();
	}

	public function callback(){
		$user = Socialite::driver('qq')->user();
		$accessTokenResponseBody = $user->accessTokenResponseBody;
		$search=[
			'openid'=> $user->id,
			'accesstoken'=> $accessTokenResponseBody['access_token']
		];
		if(User::where('name', '=', $user->nickname)->firstOrFail()){
			$user->nickname .= rand(1,1000);
		}
		$insert = [
			'name'        => $user->nickname,
			'img'         => $user->user['figureurl'],
			'openid'      => $user->id,
			'accesstoken' => $user->token,
			'sex'         => $user->user['gender'],
			'province'    => $user->user['province'],
			'city'        => $user->user['city'],
		];
		$login_user = User::updateOrCreate($search, $insert);
		Auth::loginUsingId($login_user->id);

		return redirect('/');
	}
}
