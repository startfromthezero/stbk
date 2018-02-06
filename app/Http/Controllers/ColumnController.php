<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin\News;
use App\User;
use App\Comment;
use App\Sign;

class ColumnController extends Controller
{
	protected $fields = [
		'title'     => '',
		'from'      => 2,
		'user_id'   => '',
		'img'       => '/img/cover_default.jpg',
		'type_id'   => '',
		'is_show'   => 0,
		'is_recomm' => 0,
		'is_top'    => 0,
		'keyword'   => '',
		'synopsis'  => '',
		'content'   => '',
	];
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
		foreach ($news as &$new){
			$new->reply = Comment::where('new_id',$new->id)->count();
		}
		date_default_timezone_set('Asia/Shanghai');

		$data = [
			'types'  => $this->types,
			'status' => $this->status,
			'type'   => $type,
			'state'  => $state,
			'news'   => $news,
			'count'  => $count,
			'page'   => $start,
			'keys'   => $keys,
		];

		if (Auth::check())
		{
			$sign = (object)[];
			$signById = User::find(Auth::id())->hasOneSign;
			if(isset($signById->id) && $signById->last_sign_time >= strtotime(date('Ymd', strtotime('-1 day')))){
				$sign->is_sign = false;
				$sign->sign_days = $signById->sign_days;
				if ($signById->last_sign_time >= strtotime(date('Y-m-d', time())) && $signById->last_sign_time < strtotime(date('Y-m-d', strtotime('+1 days'))))
				{
					$sign->is_sign = true;
				}
				if ($signById->sign_days < 5)
				{
					$sign->sign_score = 5;
				}
				elseif ($signById->sign_days >= 5 && $signById->sign_days < 15)
				{
					$sign->sign_score = 10;
				}
				elseif ($signById->sign_days >= 15 && $signById->sign_days < 30)
				{
					$sign->sign_score = 15;
				}
				elseif ($signById->sign_days >= 30 && $signById->sign_days < 100)
				{
					$sign->sign_score = 20;
				}
				elseif ($signById->sign_days >= 100 && $signById->sign_days < 365)
				{
					$sign->sign_score = 30;
				}
				else
				{
					$sign->sign_score = 50;
				}
			}else{
				$sign->is_sign = false;
				$sign->sign_days = 0;
				$sign->sign_score = 5;
			}
			$data['sign'] = $sign;
		}

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
			'users'=> $user->getName(),
			'reply'=> Comment::where('new_id', $new->id)->count()
		];
		event(new \App\Events\newsViewEvent($new));
//		echo htmlspecialchars_decode($new->content);
//		exit();
		//dd(htmlspecialchars_decode($new->content));
		return view('column/detail', $data);
	}

	public function create(){
		$types = array_values($this->types);
		$types[0] = '请选择';
		$data = ['types'=> $types];
		return view('column/create', $data);
	}

	public function store(Request $request){
		$new = new News();
		foreach (array_keys($this->fields) as $field)
		{
			$new->$field = $request->get($field);
		}

		$new->content = htmlspecialchars($new->content);
		$new->user_id = Auth::id();
		$new->is_show = 0;
		$new->is_recomm = 0;
		$new->is_top = 0;
		$new->img ='/img/cover_default.jpg';
		$new->from =2;

		$new->save();

		return redirect('/jie/'. $new->id)->withSuccess('发表成功！');
	}

	public function update(Request $request){
		$new = News::find((int)$request->id);
		foreach (array_keys($this->fields) as $field)
		{
			$new->$field = $request->get($field);
		}
		$new->content   = htmlspecialchars($new->content);
		$new->user_id   = Auth::id();
		$new->is_show   = 0;
		$new->is_recomm = 0;
		$new->is_top    = 0;
		$new->img       = '/img/cover_default.jpg';
		$new->from      = 2;
		$new->save();

		return redirect('/jie/' . $new->id)->withSuccess('编辑成功！');
	}

	public function edit($id){
		$new = News::find((int)$id);
		$types = array_values($this->types);
		$types[0] = '请选择';
		$data = [
			'newAll' => News::all()->toArray(),
			'id'     => (int)$id,
			'types'  => $types
		];
		if (!$new){
			return redirect('/')->withErrors("找不到该文章!");
		}
		foreach (array_keys($this->fields) as $field)
		{
			$data[$field] = old($field, $new->$field);
		}

		return view('column/edit', $data);
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
