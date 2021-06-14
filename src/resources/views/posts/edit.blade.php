@extends('layouts.default')

@section('title', '編集')

@section('content')
    <h1 class="mb-4">
        <div class="row">
            <div class="col">
                編集
            </div>
            <div class="col-auto">
                @include('layouts.return')    
            </div>
        </div>
    </h1>
    <form method="post" action="{{ url('/posts', $post->id) }}" class="ml-2">
        @csrf
        {{ method_field('patch') }}
        <div class="form-group">
                <input type="text" name="title" placeholder="タイトルを入力" value="{{ old('title', $post->title) }}" class="form-control border-info mt-4">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>
        <div class="form-group">
                <textarea name="body" placeholder="本文を入力" class="form-control border-info" rows="3">{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>
                <input type="submit" value="更新" class="btn btn-success">
    </form>
@endsection