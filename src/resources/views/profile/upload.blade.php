@extends('layouts.default')

@section('title', 'MyTop3')

@section('content')

    <div class="row mb-4">
      <div class="col">
        <h3>プロフィール画像<br class="d-inline d-sm-none mb-4" />アップロード</h3>
      </div>      
    </div>
    <form method="post" action="{{ route('profile_image') }}" enctype="multipart/form-data" class="form-inline">
      @csrf
      <div class="form-group">
        <input type="file" name="image" class="form-control border-0">
      </div>
      <div class="form-group">        
        <input type="submit" value="アップロード" class="btn btn-info">
      </div>
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </form>
    <p><h3 class="font-weight-bold text-center my-5">
      {{ $user->name }}
    </h3></p>
    <div class="row justify-content-center my-4 mx-auto">  
      <div class="col-md-4 col-sm-8">   
        @auth  
          @if (!$user->image == null)
            <img src="data:image/png;base64,{{ $user->image }}" class="card-img" width="20%" height="auto">
          @else
            <p class="text-center">プロフィール画像がありません</p>
          @endif
        @endauth
      </div>
    </div>
@endsection