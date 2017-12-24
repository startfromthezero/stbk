<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
	/**
	 * 显示创建博客文章的表单。
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('post.create');
	}

	/**
	 * 保存一个新的博客文章。
	 *
	 * @param  Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'bail|required|unique:posts|max:255',
			'author.name'  => 'required',
			'author.description' => 'required',
		]);
		// 文章内容是符合规则的，存入数据库
	}
}
