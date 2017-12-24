@extends('layouts.app')

@section('content')
    <a href="{{ route('articles.create') }}" style="padding:5px;border:1px dashed gray;">
        + New Article
    </a>

    @foreach ($articles as $article)
        <div style="border:1px solid gray;margin-top:20px;padding:20px;">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->content }}</p>
            <a href="{{ route('articles.edit', $article->id ) }}">Edit</a>
            <form action="{{ route('articles.destroy', $article->id) }}" method="post" style="display: inline-block;">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" style="color: #F08080;background-color: transparent;border: none;">Delete</button>
            </form>
        </div>
    @endforeach
@endsection