<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin\News;
use App\User;

class ColumnController extends Controller
{
	protected $types = array('all'=>'首页','quiz'=>'提问', 'share'=>'分享', 'discuss'=>'讨论', 'suggest'=>'建议', 'notice'=>'公告','news'=>'动态');
	protected $status = array('all'=>'综合','unsolved'=>'未结', 'solved'=>'已结', 'wonderful'=>'精华');
	public function index(Request $request){
		$start  = $request->get('page', 1);
		$length = $request->get('limit', 10);
		$type = $request->type;
		$state = $request->state;
		$arr = array();
		$keys = array_keys($this->types);
		if(isset($this->types[$type]) && $type != 'all'){
			$arr['type_id'] = array_search($type,$keys);
		}
		switch ($state){
			case 'unsolved':
				$arr['is_show'] = 1;
				break;
			case 'solved':
				$arr['is_show'] = 0;
				break;
			case 'wonderful':
				$arr['is_recomm'] = 1;
				break;
			default:
				break;
		}

		if(!empty($arr)){
			$count = News::where($arr)->count();
			$news=News::orderByRaw('concat(is_top,created_at) desc')->where($arr)->skip(($start - 1) * $length)->take($length)->get();
		}else{
			$count = News::count();
			$news = News::orderByRaw('concat(is_top,created_at) desc')->skip(($start - 1) * $length)->take($length)->get();
		}

		$data = [
			'types'  => $this->types,
			'status' => $this->status,
			'type'   => $type,
			'state'  => $state,
			'news'   => $news,
			'count'  => $count,
			'page'   => $start,
			'keys'   => $keys
		];
		return view('column/index', $data);
	}

	public function jie(Request $request, $id){
		$new = News::with('hasManyComments')->findOrFail($id);
		if ($request->ajax())
		{
			if (isset($request->is_show)){
				$new->is_show = (int)$request->is_show;
			}
			if (isset($request->is_recomm)){
				$new->is_recomm = (int)$request->is_recomm;
			}
			if (isset($request->is_top)){
				$new->is_top = (int)$request->is_top;
			}
			$boot = $new->save();
			if ($boot){
				$out = array('status' => 0, 'msg' => '修改成功');
			}else{
				$out = array('status' =>-1, 'msg' => '修改失败');
			}

			return response()->json($out);
		}
		$keys = array_keys($this->types);
		$user = new User();
		$data = [
			'new'=> $new,
			'types' => $this->types,
			'keys' => $keys,
			'users'=> $user->getName()
		];
//		echo htmlspecialchars_decode($new->content);
//		exit();
		//dd(htmlspecialchars_decode($new->content));
		return view('column/detail', $data);
	}

	public function create(){
		return view('column/create');
	}

	public function edit(){

	}

	public function collect(Request $request,$type){
		if ($request->ajax()){
			$news = new News();
			$out = array('status' => 0);
			if ($type == 'add'){
				if ($news->favorited($request->nid))
				{
					$out = array('status' => -1,'msg'=>'该记录已经在收藏夹中');
				}else{
					Auth::user()->favorites()->attach($request->nid);
				}
			}
			if ($type == 'remove'){
				Auth::user()->favorites()->detach($request->nid);
			}

			return response()->json($out);
		}
		return back();
	}
}
