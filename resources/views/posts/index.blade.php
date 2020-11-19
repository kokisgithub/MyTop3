@extends('layouts.default')

@section('title', 'MyTop10')

@section('content')

    <h1>
    <a href="{{ url('/posts/create') }}" class="float-right btn btn-outline-primary">新規作成</a>
    MyTop10
    </h1>
      <table class="table table-striped table-hover mt-3">
        @forelse ($posts as $post)
          <tr>
            <td>
                <a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a>
            </td>
            <td>
                <a href="{{ action('PostsController@edit', $post) }}" class="btn btn-outline-secondary">編集</a>
            </td>
            <td>
                <form method="post" action="{{ url('/posts', $post->id) }}" id="form_{{ $post->id }}">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                  <input type="submit" value="削除" class="btn btn-outline-danger">
                </form>
            </td>
            @empty
            <p>投稿がありません</p>
          </tr>
        @endforelse
      </table>

@endsection