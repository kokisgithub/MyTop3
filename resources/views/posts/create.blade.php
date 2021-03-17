@extends('layouts.default')

@section('title', '新規投稿')

@section('content')
    <h1 class="mb-5">
        @include('layouts.return')    
        新規投稿
    </h1>
    <form method="get" action="{{ url('/posts/create') }}" class="form-inline">
    <div class="form-group">
            <select class="form-control custom-select border-info" name="bullets">
                <option selected>記号を選ぶ</option>
                <option value="1">① ② ③</option>
                <option value="2">1. 2. 3.</option>
                <option value="3">Ⅰ. Ⅱ. Ⅲ.</option>
                <option value="4">壱 弐 参</option>
                <option value="5">・ ・ ・</option>
            </select>
    </div>
    <button type="submit" class="btn btn-dark text-warning">選択</button>
    </form>
    <form method="post" action="{{ url('/posts') }}">
        @csrf
        <div class="form-group">
                <input type="text" name="title" placeholder="タイトルを入力" value="{{ old('title') }}" class="form-control border-info mt-4">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>
        <div class="form-group">
            <textarea name="body" placeholder="本文を入力" class="form-control border-info" rows="3">{{ old('body', $bullets) }}</textarea>
            @error('body')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="投稿" class="btn btn-primary">
    </form>
@endsection