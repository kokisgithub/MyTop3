@extends('layouts.default')

@section('title', '新規投稿')

@section('content')
    <h1>
    <a href="{{ url('/') }}" class="float-right btn btn-outline-primary">戻る</a>
    編集
    </h1>
    <form method="post" action="{{ url('/posts', $post->id) }}">
    {{ csrf_field() }}
    {{ method_field('patch') }}
    <p>
        <input type="text" name="title" placeholder="タイトルを入力" value="{{ old('title', $post->title) }}">
        @if ($errors->has('title'))
        <span class="text-danger">{{ $errors->first('title') }}</span>
        @endif
    </p>
    <p>
        <textarea name="body" placeholder="本文を入力">{{ old('body', $post->body) }}</textarea>
        @if ($errors->has('body'))
        <span class="text-danger">{{ $errors->first('body') }}</span>
        @endif
    </p>
    <p>
        <input type="submit" value="更新">
    </p>
    </form>
@endsection
