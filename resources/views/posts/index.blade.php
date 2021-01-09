@extends('layouts.default')

@section('title', 'MyTop3')

@section('content')

    <h1 class="mb-5">
     MyTop3
        <a href="{{ url('/posts/create') }}" class="btn btn-outline-primary float-right">投稿する</a>
    </h1>
      @include('posts.search')
      <table class="table table-bodered table-hover mt-3">
        @forelse ($posts as $post)
          <tr>
            <td>
                <a href="{{ action('PostsController@show', $post) }}" class="font-weight-bold">{{ $post->title }}</a>
            </td>
            <td class="text-center text-secondary font-weight-bold">
            {{ optional($post->user)->name }}
            </td>
            @auth
              @if ($post->user_id === $login_user_id)
                <td>
                  @include('layouts.modal_delete_post')
                </td>
                <td>
                  <a href="{{ action('PostsController@edit', $post) }}" class="btn btn-outline-success">編集</a>
                </td>
              @endif
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