<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\News;

class ColumnController extends Controller
{
	protected $types = array('all'=>'首页','quiz'=>'提问', 'share'=>'分享', 'discuss'=>'讨论', 'suggest'=>'建议', 'notice'=>'公告','news'=>'动�??');
	protected $status = array('all'=>'综合','unsolved'=>'未结', 'solved'=>'已结', 'wonderful'=>'精华');
	public function index(Request $request){
		$array= array('quiz'=>'1', 'share' => '2', 'discuss' => '3', 'suggest' => '4', 'notice' => '5', 'news' => '6');
		$arr =array();
		if(isset($this->types[$request->type]) && $request->type != 'all'){
			$arr['type_id'] = $array[$request->type];
		}
		switch ($request->state){
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
			$news=News::orderByRaw('concat(is_top,created_at) desc')->where($arr)->get();
		}else{
			$news = News::orderByRaw('concat(is_top,created_at) desc')->get();
		}
		$count = count($news);

		$data =[
			'types'=> $this->types,
			'type'=> $request->type,
			'status'=> $this->status,
			'state'=> $request->state,
			'news' => $news,
			'count'=> $count,
			'page' => 1,
			'array'=> array_flip($array)
		];
		return view('column/index', compact('data'));
	}

	public function jie($id){
		$new = News::findOrFail($id);
		return view('column/detail', compact('new'));
	}

	public function create(){
		return view('column/create');
	}
}
