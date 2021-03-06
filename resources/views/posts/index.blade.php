@extends('layouts.default')

@section('title', 'MyTop3')

@section('content')

    <h1 class="mb-5">
     MyTop3
        <a href="{{ url('/posts/create') }}" class="btn btn-outline-primary float-right">投稿する</a>
    </h1>
      @include('posts.search')
      <table class="table table-striped table-hover mt-5">
          <tr>
            <th>
              タイトル
            </th>
            <th class="text-center pl-5">
              ユーザー
            </th>
            <th>    
            </th>
              @auth
                  <th>    
                  </th>    
                  <th>    
                  </th>    
              @endauth
          </tr>
        @forelse ($posts as $post)
          <tr>
            <td>
                <a href="{{ action('PostsController@show', $post) }}" class="font-weight-bold">{{ $post->title }}</a>
            </td>
            <td class="text-center text-secondary font-weight-bold pl-5">
            {{ optional($post->user)->name }}
            </td>
            @if (!$post->user->image == null)
              <td>
                <img src="{{ asset('/storage/' . $post->user->image) }}" width="50" height="50">
              </td>           
            @else
              <td></td>
            @endif
            @auth
              @if ($post->user_id === $login_user_id)
                <td class="text-center">
                  @include('layouts.modal_delete_post')
                </td>
                <td class="text-center pr-5">
                  <a href="{{ action('PostsController@edit', $post) }}" class="btn btn-outline-success">編集</a>
                </td>
              @else
                <td>
                </td>
                <td>
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