@extends('layouts.default')

@section('title', 'MyTop3')

@section('content')

    <h1>
    <a href="{{ url('/posts/create') }}" class="float-right btn btn-outline-primary">新規作成</a>
    MyTop3
    </h1>
    @include('posts.search')
      <table class="table table-striped table-hover mt-3">
        @forelse ($posts as $post)
          <tr>
            <td>
                <a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a>
            </td>
            <td>
            <td>
            @include('layouts.modal_delete_post')
            <td>
                <a href="{{ action('PostsController@edit', $post) }}" class="btn btn-outline-success">編集</a>
            </td>
            @empty
            <td class="mt-4">投稿がありません</td>
          </tr>
        @endforelse
      </table>
  <div class="text-center">
    {!! $posts->appends(['keyword'=>$keyword])->render('vendor.pagination.bootstrap-4') !!}
  </div>
@endsection