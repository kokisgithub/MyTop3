@extends('layouts.default')

@section('title', '新規投稿')

@section('content')

    <h1 class="mb-4">
        <div class="row justify-content-between">
            <div class="col">
                新規投稿
            </div>
            <div class="col-auto">
                @include('layouts.return')    
            </div>
        </div>
    </h1>
    <form method="get" action="{{ route('create') }}" class="form-inline ml-4">
        <div class="form-group row">
            <select class="form-control custom-select border-info col-8" name="selected_symbol">
                <option disabled selected hidden>記号を選ぶ</option>
                @foreach ($symbols as $symbol)
                    <option value="{{ $symbol->body }}">{{ $symbol->symbol }}</option>
                @endforeach
            </select>
          <button type="submit" class="btn btn-dark text-warning col-4">選択</button>
        </div> 
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