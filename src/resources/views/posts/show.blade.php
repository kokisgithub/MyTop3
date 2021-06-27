@extends('layouts.default')

@section('title', $post->title)

@section('content')
    
    <h6 class="text-secondary">
        <div class="row">
            <div class="col">
                <a href="{{ route('profile', $post->user_id) }}">
                    @if (!$post->user->image == null)
                        <img src="data:image/png;base64,{{ $post->user->image }}" width="50" height="50">
                    @endif
                    {{ optional($post->user)->name }}
                </a>
            </div>
        </div>
    </h6>
    <h3 class="mt-4 mb-4 ml-3 text-danger">
        {{ $post->title }}
    </h3>
    <h4 class="mt-4 mb-5 ml-5 text-danger">
        {!! nl2br(e($post->body)) !!} 
    </h4>
    <h5 class="mt-5">
        コメント
    </h5>
    <form method="post" action="{{ action('CommentsController@store', $post) }}" >
        @csrf
        <div class="form-group mt-3">
                <input type="text" name="body" placeholder="コメントを入力" value="{{ old('body') }}" class="form-control border-info">
                @error('body')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>
        <input type="submit" value="コメントする" class="btn btn-primary">
    </form>
    <table class="table table-striped table-hover mt-4">
        <tr>
            <th scope="col">
                コメント
            </th>
            <th scope="col">
                ユーザー
            </th>
            @auth
                <th scope="col">
                </th>
            @endauth
        </tr>
        @forelse ($post->comments as $comment)
            <tr>
                <td>
                    {{ $comment->body }}
                </td>
                <td class="text-secondary font-weight-bold">
                    <a href="{{ route('profile', $comment->user_id) }}">
                        @if (!$comment->user->image == null)
                            <img src="data:image/png;base64,{{ $comment->user->image }}" width="50" height="50">
                        @endif
                        <p>
                            {{ optional($comment->user)->name }}
                        </p>
                    </a>
                </td>
                @auth
                    @if ($comment->user_id === $login_user_id)
                        <td>
                            @include('layouts.modal_delete_comment')
                        </td>
                    @else
                        <td>
                        </td>
                    @endif
                @endauth
        @empty
                <td class="mt-4">コメントがありません</td>
            </tr>
        @endforelse
    </table>
@endsection