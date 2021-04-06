@extends('layouts.default')

@section('title', 'MyTop3')

@section('content')

    <h2 class="mb-5">
      @include('layouts.return')    
      プロフィール画像アップロード
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
      <table class="table table-striped table-hover mt-4">
          <tr>
            <th class="text-center">
              <h2>{{ $user->name }}</h2>
            </th>
          </tr>
          <tr>
            @auth  
              @if (!$user->image == null)
                  <td class="text-center">
                    <img src="data:image/png;base64,{{ $user->image }}" width="30%" height="auto">
                  </td>
              @else
                <td class="mt-4 text-center">プロフィール画像がありません</td>
              @endif
            @endauth
          </tr>
      </table>
@endsection