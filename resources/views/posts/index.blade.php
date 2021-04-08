@extends('layouts.default')

@section('title', 'MyTop3')

@section('content')

    <h1 class="mb-4">
     MyTop3
        <a href="{{ route('create') }}" class="btn btn-outline-primary float-right">投稿する</a>
    </h1>
      @include('posts.search')
      <table class="table table-striped table-hover mt-2">
          <tr>
            <th scope="col">
              タイトル
            </th>
            <th scope="col">
              ユーザー
            </th>
            @auth
              <th scope="col">    
              </th>    
              <th scope="col">
              </th>    
            @endauth
          </tr>
        @forelse ($posts as $post)
          <tr>
            <td>
                <u><a href="{{ route('show', $post) }}" class="font-weight-bold">{{ $post->title }}</a></u>
            </td>
            <td class="text-secondary font-weight-bold">
              @if (!$post->user->image == null)
                <img src="data:image/png;base64,{{ $post->user->image }}" width="50" height="50">
              @endif
              <p>
               {{ optional($post->user)->name }}
              </p>
            </td>
            @auth
              @if ($post->user_id === $login_user_id)
                <td>
                  @include('layouts.modal_delete_post')
                </td>
                <td>
                  <a href="{{ route('edit', $post) }}" class="btn btn-outline-success">編集</a>
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