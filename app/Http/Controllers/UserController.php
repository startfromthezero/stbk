<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\user;

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
}
