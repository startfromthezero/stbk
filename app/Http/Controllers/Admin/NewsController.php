<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\News;
use App\Models\Admin\AdminUser as User;

class NewsController extends Controller
{
	protected $fields = [
		'title'   => '',
		'from'    => '1',
		'user_id' => '',
		'img'   => '/img/cover_default.jpg',
		'type_id'   => '',
		'is_show'   => '',
		'is_recomm'   => '',
		'is_top'   => '',
		'keyword'   => '',
		'synopsis'   => '',
		'content'   => '',
	];
	protected $types = [
		'1'=>'提问',
		'2'=>'分享',
		'3'=>'讨论',
		'4'=>'建议',
		'5'=>'公告',
		'6'=>'动态'
	];

	public function index(Request $request)
	{
		$start          = $request->get('page', 1);
		$length         = $request->get('limit', 10);
		$search         = $request->get('search');
		$data           = array();
		$data['page']   = $start;
		$data['search'] = $search;
		$data['count']  = News::count();
		if (strlen($search) > 0)
		{
			$data['count'] = News::where(function ($query) use ($search) {
				$query->where('title', 'LIKE', '%' . $search . '%')->orWhere('email', 'like', '%' . $search . '%');
			})->count();
			$data['news'] = News::where(function ($query) use ($search) {
				$query->where('title', 'LIKE', '%' . $search . '%')->orWhere('email', 'like', '%' . $search . '%');
			})->skip(($start - 1) * $length)->take($length)->get();
		}
		else
		{
			$data['news'] = News::skip(($start - 1) * $length)->take($length)->get();
		}
		$user = new User();
		$data['users'] = $user->getName();

		return view('admin.news.index', compact('data'));
	}

	public function show()
	{
		return view('admin/news/show')->withNews(News::all());
	}

	public function create(Request $request)
	{
		$data = [];
		foreach ($this->fields as $field => $default)
		{
			$data[$field] = old($field, $default);
		}
		$data['newsAll'] = News::all()->toArray();
		$data['types'] = $this->types;

		return view('admin.news.create', $data);
	}

	public function store(Request $request) // Laravel 的依赖注入系统会自动初始化我们需要的 Request 类
	{
		$news = new News();
		foreach (array_keys($this->fields) as $field)
		{
			$news->$field = $request->get($field);
		}

		$news->is_show = $news->is_show == 'on' ? 1 : 0;
		$news->is_recomm = $news->is_recomm == 'on' ? 1 : 0;
		$news->is_top = $news->is_top == 'on' ? 1 : 0;
		$news->save();
		event(new \App\Events\userActionEvent('\App\Models\Admin\News', $news->id, 1, '添加了文章' . $news->title));

		return redirect('/admin/news')->withSuccess('添加成功！');
	}

	public function destroy($id)
	{
		$tag = News::find((int)$id);
		if ($tag){
			$tag->delete();
		}else{
			return redirect()->back()->withErrors("删除失败");
		}

		return redirect()->back()->withSuccess("删除成功");
	}

	public function edit($id)
	{
		$news = News::find((int)$id);
		if (!$news){
			return redirect('/admin/news')->withErrors("找不到该文章!");
		}

		foreach (array_keys($this->fields) as $field){
			$data[$field] = old($field, $news->$field);
		}
		$data['newsAll'] = News::all()->toArray();
		$data['id']       = (int)$id;
		$data['types'] = $this->types;
		event(new \App\Events\userActionEvent('\App\Models\Admin\News', $news->id, 3, '编辑了文章' . $news->title));

		return view('admin.news.edit', $data);
	}

	public function update(Request $request, $id)
	{
		$news = News::find((int)$id);
		if($request->ajax()){
			if(isset($request->is_show)){
				$news->is_show = (int)$request->is_show;
			}
			if(isset($request->is_recomm)){
				$news->is_recomm = (int)$request->is_recomm;
			}
			if(isset($request->is_top)){
				$news->is_top = (int)$request->is_top;
			}
			$boot =$news->save();
			if($boot){
				$out = array('r'=>0,'msg'=>'修改成功');
			}else{
				$out = array('r'=> -1, 'msg' => '修改失败');
			}
			return response()->json($out);
		}
		foreach (array_keys($this->fields) as $field)
		{
			$news->$field = $request->get($field);
		}

		$news->is_show   = $news->is_show == 'on' ? 1 : 0;
		$news->is_recomm = $news->is_recomm == 'on' ? 1 : 0;
		$news->is_top    = $news->is_top == 'on' ? 1 : 0;

		$news->save();
		return redirect('/admin/news')->withSuccess('编辑成功！');
	}

	public function upload(Request $request)
	{
		if ($request->isMethod('POST'))
		{
			$destinationPath = 'img/upload/';
			//dd($_FILES);
			$file = $request->file('file');

			//是否上传成功
			if ($file->isValid())
			{
				//原文件名
				$originalName = $file->getClientOriginalName();
				//扩展名
				$ext = $file->getClientOriginalExtension();
				//MimeType
				$type = $file->getClientMimeType();
				//文件临时绝对路径
				$realPath = $file->getRealPath();

				$fileName =  uniqid() . '-'.time(). '.' . $ext;

				$file->move($destinationPath, $fileName);
				//$boot = Storage::disk('public')->put($fileName, file_get_contents($realPath));
				$data['r']   = 0;
				$data['url'] = '/'.$destinationPath. $fileName;

				return response()->json($data);
			}
		}
	}
}
