@extends('layouts.default')

@section('title', '新規投稿')

@section('content')
    <h1>
    <a href="{{ url('/') }}">戻る</a>
    新規投稿
    </h1>
    <form method="post" action="{{ url('/posts') }}">
    {{ csrf_field() }}
    <p>
        <input type="text" name="title" placeholder="タイトルを入力" value="{{ old('title') }}">
        @if ($errors->has('title'))
        <span>{{ $errors->first('title') }}</span>
        @endif
    </p>
    <p>
        <textarea name="body" placeholder="本文を入力">{{ old('body') }}</textarea>
        @if ($errors->has('body'))
        <span>{{ $errors->first('body') }}</span>
        @endif
    </p>
    <p>
        <input type="submit" value="投稿">
    </p>
    </form>
@endsection
