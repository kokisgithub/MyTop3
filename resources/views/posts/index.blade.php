@extends('layouts.default')

@section('title', 'My Top10')

@section('content')

    <h1>
    <a href="{{ url('/posts/create') }}" class="float-right btn btn-outline-primary">新規投稿</a>
    My Top10
    </h1>
      <table class="table table-striped table-hover">
        @forelse ($posts as $post)
          <tr>
            <td>
                <a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a>
            </td>
            <td>
                <a href="{{ action('PostsController@edit', $post) }}" class="btn btn-outline-secondary">編集</a>
            </td>
            @empty
            <p>投稿がありません</p>
          </tr>
        @endforelse
      </table>
@endsection