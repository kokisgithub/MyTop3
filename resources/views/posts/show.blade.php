@extends('layouts.default')

@section('title', $post->title)

@section('content')
    
    <h1>
        @include('layouts.return')    
        {{ $post->title }}
    </h1>
    <h3 class="mt-4 mb-4">
     {!! nl2br(e($post->body)) !!} 
    </h3>
    
    <h4 class="mt-5">コメント</h4>
        <form method="post" action="{{ action('CommentsController@store', $post) }}" >
            <div class="form-group mt-3">
                {{ csrf_field() }}
                    <input type="text" name="body" placeholder="タイトルを入力" value="{{ old('body') }}" class="form-control border-info">
            </div>
                    @if ($errors->has('body'))
                    <span class="text-danger">{{ $errors->first('body') }}</span>
                    @endif
                    @if ($errors->has('body'))
                    <span class="text-danger">{{ $errors->first('body') }}</span>
                    @endif
                    <input type="submit" value="コメントする" class="btn btn-primary">
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
