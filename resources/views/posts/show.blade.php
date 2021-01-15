@extends('layouts.default')

@section('title', $post->title)

@section('content')
    
    <h1>
        @include('layouts.return')    
        {{ $post->title }}
    </h1>
    <h3 class="mt-4 mb-5">
     {!! nl2br(e($post->body)) !!} 
    </h3>
    
    <h4 class="mt-5">コメント</h4>
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
        <table class="table table-striped table-hover mt-5">
            <tr>
                <th>
                    コメント
                </th>
                <th class="text-center pl-5">
                    ユーザー
                </th>
                @auth
                    <th>
                    </th>
                @endauth
            </tr>
            @forelse ($post->comments as $comment)
                <tr>
                    <td>
                        {{ $comment->body }}
                    </td>
                    <td class="text-secondary text-center font-weight-bold pl-5">
                        {{ optional($comment->user)->name }}
                    </td>
                    @auth
                        @if ($comment->user_id === $login_user_id)
                            <td class="text-center pr-5">
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