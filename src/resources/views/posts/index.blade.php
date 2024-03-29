@extends('layouts.default')

@section('title', 'MyTop3')

@section('content')

  <h1 class="mb-4">
    <div class="row">
      <div class="col">
        MyTop3
      </div>
      <div class="col-auto">
        <a href="{{ route('create') }}" class="btn btn-outline-primary">投稿する</a>
      </div>
    </div>
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
      </tr>
    @forelse ($posts as $post)
      <tr>
        <td>
            <u><a href="{{ route('show', $post) }}" class="font-weight-bold">{{ $post->title }}</a></u>
        </td>
        <td class="text-secondary font-weight-bold">
          <a href="{{ route('profile', $post->user_id) }}">
            @if (!$post->user->image == null)
              <img src="data:image/png;base64,{{ $post->user->image }}" width="50" height="50">
            @endif
            <p>
              {{ optional($post->user)->name }}
            </p>
          </a>
        </td>
    @empty
        <td class="mt-4">投稿がありません</td>
      </tr>
    @endforelse
  </table>
  <div class="text-center">
    {!! $posts->appends(['keyword'=>$keyword])->render('vendor.pagination.paginate') !!}
  </div>
@endsection