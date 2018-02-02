<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
	public function store(Request $request)
	{
		if (Comment::create($request->all()))
		{
			return redirect()->back();
		}
		else
		{
			return redirect()->back()->withInput()->withErrors('评论发表失败！');
		}
	}

	public function getDa(Request $request)
	{
		if ($request->ajax())
		{
			$com = Comment::find((int)$request->id);
			$out = array(
				'status' => 0,
				'msg'    => '编辑成功',
				'rows'   => $com
			);

			return response()->json($out);
		}
	}

	public function updateDa(Request $request)
	{
		$com = Comment::find((int)$request->id);
		$com->content = $request->get('content');
		$com->save();

		return redirect('/jie/'. $com->new_id)->withSuccess('编辑成功！');
	}
}
