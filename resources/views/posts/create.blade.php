@extends('layouts.default')

@section('title', '新規投稿')

@section('content')
    <h1>
    <a href="{{ url('/') }}" class="float-right btn btn-outline-primary">戻る</a>
    新規投稿
    </h1>
    <form method="post" action="{{ url('/posts') }}">
        <div class="form-group">
            {{ csrf_field() }}
            <p>
                <input type="text" name="title" placeholder="タイトルを入力" value="{{ old('title') }}" class="form-control">
                @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </p>
        </div>
        <div class="form-group">
            <p>
                <textarea name="body" placeholder="本文を入力" class="form-control">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                <span class="text-danger">{{ $errors->first('body') }}</span>
                @endif
            </p>
        </div>
        <div class="form-group">
            <p>
                <input type="submit" value="投稿" class="btn btn-outline-primary">
            </p>
        </div>
    </form>
@endsection
