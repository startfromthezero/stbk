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
			'username'              => 'required|alpha|min:2',
			'email'                 => 'required|email|unique:users',
			'password'              => 'required|alpha_num|between:6,12|confirmed'
		]);
	}

	public function post(){
		$myFavorites = Auth::user()->favorites;
		$data =[
			'myFavorites'=> $myFavorites,
			'count'      => Favorite::count()
		];
		return view('user/post', $data);
	}
}
