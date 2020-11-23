@extends('layouts.default')

@section('title', $post->title)

@section('content')
    
    <h1>
    <a href="{{ url('/') }}" class="float-right ml-5 btn btn-outline-primary">戻る</a>
        {{ $post->title }}
    </h1>
    <p class="mt-4 mb-5">
    {!! nl2br(e($post->body)) !!} 
    </p>
    
    <h3 class="mt-5">コメント</h3>
        <form method="post" action="{{ action('CommentsController@store', $post) }}">
            <div class="form-group">
                {{ csrf_field() }}
                    <input type="text" name="body" placeholder="タイトルを入力" value="{{ old('body') }}" class="form-control">
            </div>
                    @if ($errors->has('body'))
                    <span class="text-danger">{{ $errors->first('body') }}</span>
                    @endif
                    @if ($errors->has('body'))
                    <span class="text-danger">{{ $errors->first('body') }}</span>
                    @endif
                    <input type="submit" value="コメントする" class="btn btn-outline-primary">
        </form>
        <table class="table table-striped table-hover mt-2">
            @forelse ($post->comments as $comment)
                <tr>
                    <td>
                        {{ $comment->body }}
                    </td>
                    <td>
                    @include('layouts.modal_delete_comment')
                    </td>
                    @empty
                    <td class="mt-4">コメントがありません</td>
                </tr>
            @endforelse
        </table>

@endsection
