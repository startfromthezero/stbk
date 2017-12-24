<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
	public function index()
	{
		return view('admin/news/index');
	}

	public function show()
	{
		return view('admin/news/show')->withNews(News::all());
	}

	public function create()
	{
		return view('admin/news/create');
	}

	public function store(Request $request) // Laravel 的依赖注入系统会自动初始化我们需要的 Request 类
	{
		// 数据验证
		$this->validate($request, [
			'title'   => 'required|unique:articles|max:255',
			// 必填、在 articles 表中唯一、最大长度 255
			'content' => 'required',
			// 必填
		]);

		// 通过 Article Model 插入一条数据进 articles 表
		$news          = new News; // 初始化 Article 对象
		$news->title   = $request->get('title');
		$news->from   = $request->get('from');
		$news->type_id   = $request->get('type_id');
		$news->is_show   = $request->get('is_show') == 'on' ? 1 : 0;
		$news->is_recomm   = $request->get('is_recomm') == 'on' ? 1 : 0;
		$news->is_top   = $request->get('is_top') == 'on' ? 1 : 0;
		$news->keyword   = $request->get('keyword');
		$news->synopsis   = $request->get('synopsis');
		$news->content = $request->get('content'); // 同上
		$news->user_id = $request->user()->id; // 获取当前 Auth 系统中注册的用户，并将其 id 赋给 article 的 user_id 属性

		// 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
		if ($news->save())
		{
			return redirect('admin/news/show'); // 保存成功，跳转到 文章管理 页
		}
		else
		{
			// 保存失败，跳回来路页面，保留用户的输入，并给出提示
			return redirect()->back()->withInput()->withErrors('保存失败！');
		}
	}

	public function destroy(Request $request, $id)
	{
		$article = Article::findOrFail($id);
		if ($request->user()->cannot('destroy-post', $article))
		{
			return "你没有权限！";
			//abort(403);
		}
		Article::find($id)->delete();

		return redirect()->back()->withInput()->withErrors('删除成功！');
	}

	public function edit($id)
	{
		$news = News::where('news_id',$id);
		return view('admin/news/edit', compact('news'));
	}

	public function update(Request $request, $id)
	{
		$article = News::findOrFail($id);
		//		if ($request->user()->cannot('update-post', $article))
		//		{
		//			return "你没有权限！". $request->user();
		//			//abort(403);
		//		}
		$this->authorize($article);

		$article->update([
			'title'   => $request->get('title'),
			'content' => $request->get('content'),
			'user_id' => $request->user()->id
		]);

		return redirect('admin/news');
	}

	public function upload(Request $request)
	{
		if ($request->isMethod('POST'))
		{
			//dd($_FILES);
			$file = $request->file('source');
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

				$fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;

				$boot = Storage::disk('public')->put($fileName, file_get_contents($realPath));

				var_dump($boot);
			}
		}
		return view('student.upload');
	}
}
