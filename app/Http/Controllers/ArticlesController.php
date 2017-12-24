<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class ArticlesController extends Controller
{
    //
	public function index()
	{
		$articles = Article::orderBy('created_at', 'desc')->get();
		return view('articles.index', compact('articles'));
	}

	public function create()
	{
		return view('articles.create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|max:50',
		]);

		$article = Article::create([
			'title'   => $request->title,
			'content' => $request->content,
		]);

		return redirect()->route('articles.index');
	}

	public function edit($id)
	{
		$article = Article::findOrFail($id);

		return view('articles.edit', compact('article'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title' => 'required|max:50',
		]);

		$article = Article::findOrFail($id);
		$article->update([
			'title'   => $request->title,
			'content' => $request->content,
		]);

		return redirect()->route('articles.index');
	}

	public function destroy($id)
	{
		$article = Article::findOrFail($id);
		$article->delete();

		return redirect()->back();
	}
}
