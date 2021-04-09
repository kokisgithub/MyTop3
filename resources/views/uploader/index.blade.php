@extends('layouts.default')

@section('title', 'MyTop3')

@section('content')

    <h2 class="mb-5">
      <div class="row justify-content-between">
        <div class="col">
          プロフィール画像アップロード
        </div>
        <div class="col-auto">
          @include('layouts.return')    
        </div>
      </div>
    </h2>
    <form method="post" action="{{ route('profile_image') }}" enctype="multipart/form-data" class="form-inline ml-2">
        @csrf
        <div class="form-group">
          <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">        
          <input type="submit" value="アップロード" class="btn btn-info">
        </div>
          @error('image')
              <span class="text-danger">{{ $message }}</span>
          @enderror
    </form>
    <div class="row justify-content-center mt-5">  
      <div class="col-md-8">  
        <div class="card">  
          <div class="card-header font-weight-bold text-center">
            {{ $user->name }}
          </div>
          <div class="card-body text-center">
            @auth  
              @if (!$user->image == null)
                <img src="data:image/png;base64,{{ $user->image }}" width="40%" height="auto">
              @else
                プロフィール画像がありません
              @endif
            @endauth
          </div>
        </div>
      </div>
    </div>
@endsection