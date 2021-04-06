@extends('layouts.default')

@section('title', '新規投稿')

@section('content')

    <h1 class="mb-4">
        @include('layouts.return')    
        新規投稿
    </h1>
    <form method="get" action="{{ route('create') }}" class="form-inline ml-2">
        <div class="form-group">
                <select class="form-control custom-select border-info" name="selected_symbol">
                    <option disabled selected hidden>記号を選ぶ</option>
                    @foreach ($symbols as $symbol)
                        <option value="{{ $symbol->body }}">{{ $symbol->symbol }}</option>
                    @endforeach
                </select>
        </div> 
        <button type="submit" class="btn btn-dark text-warning">選択</button>
    </form>
    <form method="post" action="{{ url('/posts') }}" class="ml-2">
        @csrf
        <div class="form-group">
                <input type="text" name="title" placeholder="タイトルを入力" value="{{ old('title') }}" class="form-control border-info mt-4">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>
        <div class="form-group">
            <textarea name="body" placeholder="本文を入力" class="form-control border-info" rows="3">{{ old('body', $selected_symbol) }}</textarea>
            @error('body')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="投稿" class="btn btn-primary">
    </form>
@endsection