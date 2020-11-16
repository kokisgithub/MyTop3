@extends('layouts.default')

@section('title', 'My Top10')

@section('content')

    <h1>
    <a href="{{ url('/posts/create') }}" >新規投稿</a>
    My Top10
    </h1>
    <ul>
      @forelse ($posts as $post)
      <li><a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a></li>
      @empty
      <li>投稿がありません</li>
      @endforelse
    </ul>
@endsection