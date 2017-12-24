<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    public function index(){
		return view('admin/article/index')->withArticles(Article::all());
	}

	public function show(){
    	return view('admin/article/show');
	}

	public function create()
	{
		return view('admin/article/create');
	}

	public function store(Request $request) // Laravel 的依赖注入系统会自动初始化我们需要的 Request 类
	{
		// 数据验证
		$this->validate($request, [
			'title' => 'required|unique:articles|max:255',
			// 必填、在 articles 表中唯一、最大长度 255
			'content'  => 'required',
			// 必填
		]);

		// 通过 Article Model 插入一条数据进 articles 表
		$article          = new Article; // 初始化 Article 对象
		$article->title   = $request->get('title'); // 将 POST 提交过了的 title 字段的值赋给 article 的 title 属性
		$article->content    = $request->get('content'); // 同上
		$article->user_id = $request->user()->id; // 获取当前 Auth 系统中注册的用户，并将其 id 赋给 article 的 user_id 属性

		// 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
		if ($article->save())
		{
			return redirect('admin/article'); // 保存成功，跳转到 文章管理 页
		}
		else
		{
			// 保存失败，跳回来路页面，保留用户的输入，并给出提示
			return redirect()->back()->withInput()->withErrors('保存失败！');
		}
	}

	public function destroy(Request $request,$id)
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

	public function edit($id){
    	$article=Article::findOrFail($id);
    	return view('admin/article/edit',compact('article'));
	}

	public function update(Request $request, $id){
		$article = Article::findOrFail($id);
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

		return redirect('admin/article');
	}
}
