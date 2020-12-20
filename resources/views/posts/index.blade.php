@extends('layouts.default')

@section('title', 'MyTop3')

@section('content')

    <h1 class="mb-5">
     MyTop3
        <a href="{{ url('/posts/create') }}" class="btn btn-primary float-right">投稿する</a>
    </h1>
      @include('posts.search')
      <table class="table table-bodered table-hover mt-3">
        @forelse ($posts as $post)
          <tr>
            <td>
                <a href="{{ action('PostsController@show', $post) }}" class="font-weight-bold">{{ $post->title }}</a>
            </td>
            @auth
              <td>
                @include('layouts.modal_delete_post')
              </td>
            @endauth
            @auth
              <td>
                <a href="{{ action('PostsController@edit', $post) }}" class="btn btn-success">編集</a>
              </td>
            @endauth
        @empty
            <td class="mt-4">投稿がありません</td>
          </tr>
        @endforelse
      </table>
  <div class="text-center">
    {!! $posts->appends(['keyword'=>$keyword])->render('vendor.pagination.paginate') !!}
  </div>
@endsection