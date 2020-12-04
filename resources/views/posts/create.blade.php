@extends('layouts.default')

@section('title', '新規作成')

@section('content')
    <h1>
        @include('layouts.return')    
        新規作成
    </h1>
    <form method="post" action="{{ url('/posts') }}">
        <div class="form-group">
            {{ csrf_field() }}
                <input type="text" name="title" placeholder="タイトルを入力" value="{{ old('title') }}" class="form-control border-info mt-4">
                @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
        </div>
        <div class="form-group">
            <textarea name="body" placeholder="本文を入力" class="form-control border-info" rows="3">{{ old('body') }}
①
②
③</textarea>
            @if ($errors->has('body'))
            <span class="text-danger">{{ $errors->first('body') }}</span>
            @endif
        </div>
            <input type="submit" value="投稿" class="btn btn-outline-primary">
    </form>
@endsection
