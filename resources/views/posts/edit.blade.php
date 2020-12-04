@extends('layouts.default')

@section('title', '編集')

@section('content')
    <h1>
        @include('layouts.return')    
        編集
    </h1>
    <form method="post" action="{{ url('/posts', $post->id) }}">
        <div class="form-group">
            {{ csrf_field() }}
            {{ method_field('patch') }}
                <input type="text" name="title" placeholder="タイトルを入力" value="{{ old('title', $post->title) }}" class="form-control border-info mt-4">
                @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
        </div>
        <div class="form-group">
                <textarea name="body" placeholder="本文を入力" class="form-control border-info" rows="3">{{ old('body', $post->body) }}</textarea>
                @if ($errors->has('body'))
                <span class="text-danger">{{ $errors->first('body') }}</span>
                @endif
        </div>
                <input type="submit" value="更新" class="btn btn-outline-success">
    </form>
@endsection
