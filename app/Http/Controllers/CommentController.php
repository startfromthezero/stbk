<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

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
			if (Auth::check())
			{
				$com = Comment::find((int)$request->id);
				$out = array(
					'status' => 0,
					'msg'    => '编辑成功',
					'rows'   => $com
				);
			}else{
				$out = array(
					'status' => -1,
					'msg'    => '未登录'
				);
			}
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

	public function vote(Request $request){
		if ($request->ajax()){
			if(Auth::check()){
				$com = Comment::find((int)$request->id);
				if ($request->ok){
					Auth::User()->downVote($com);
				}else{
					Auth::User()->upVote($com);
				}

				$out = array('status' => 0);
			}else{
				$out = array('status' => -1, 'msg'=>'未登录');
			}
			return response()->json($out);
		}
	}

}
