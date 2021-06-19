@extends('layouts.default')

@section('title', 'MyTop3')

@section('content')

    <h6 class="text-secondary">
        <div class="row">
          <div class="col">
            @if ($user->id === $login_user_id && !$user->image == null)
              <a href="{{ route('profile_image') }}">
                <img src="data:image/png;base64,{{ $user->image }}" width="50" height="50">
              </a>
            @elseif ($user->id === $login_user_id && $user->image == null)
              <a href="{{ route('profile_image') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                  <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                </svg>
              </a>
            @elseif ($user->id !== $login_user_id && !$user->image == null)
              <img src="data:image/png;base64,{{ $user->image }}" width="50" height="50">
            @else
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              </svg>
            @endif
            {{ $user->name }}
          </div>
          @auth
            @if ($user->id === $login_user_id)
              <div class="col-auto">
                <a href="{{ route('create') }}" class="btn btn-outline-primary">投稿する</a>
              </div>
            @endif
          @endauth
        </div>
    </h6>
    投稿数： {{ $count }}
    <table class="table table-striped table-hover mt-2">
      <tr>
        <th scope="col">
          タイトル
        </th>
        @auth
          <th scope="col">    
          </th>    
          <th scope="col">
          </th>    
        @endauth
      </tr>
    @forelse ($user->posts as $post)
      <tr>
        <td>
            <u><a href="{{ route('show', $post) }}" class="font-weight-bold">{{ $post->title }}</a></u>
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
    {!! $user->posts->render('vendor.pagination.paginate') !!}
  </div>  
@endsection