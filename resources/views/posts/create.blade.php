@extends('layouts.default')

@section('title', '新規作成')

@section('content')
    <h1 class="mb-5">
        @include('layouts.return')    
        新規作成
    </h1>
    <form method="post" action="{{ url('/posts') }}">
        @csrf
        <div class="form-group">
                <input type="text" name="title" placeholder="タイトルを入力" value="{{ old('title') }}" class="form-control border-info mt-4">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>
        <div class="form-group">
<textarea name="body" placeholder="本文を入力" class="form-control border-info" rows="3">
{{ old('body',
'①
②
③') }}</textarea>
            @error('body')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="投稿" class="btn btn-primary">
    </form>
@endsection
