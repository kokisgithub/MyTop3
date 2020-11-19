@extends('layouts.default')

@section('title', '編集')

@section('content')
    <h1>
    <a href="{{ url('/') }}" class="float-right btn btn-outline-primary">戻る</a>
    編集
    </h1>
    <form method="post" action="{{ url('/posts', $post->id) }}">
        <div class="form-group">
            {{ csrf_field() }}
            {{ method_field('patch') }}
                <input type="text" name="title" placeholder="タイトルを入力" value="{{ old('title', $post->title) }}" class="form-control">
                @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
        </div>
        <div class="form-group">
                <textarea name="body" placeholder="本文を入力" class="form-control" rows="10">{{ old('body', $post->body) }}</textarea>
                @if ($errors->has('body'))
                <span class="text-danger">{{ $errors->first('body') }}</span>
                @endif
        </div>
                <input type="submit" value="更新" class="btn btn-outline-primary">
    </form>
@endsection
