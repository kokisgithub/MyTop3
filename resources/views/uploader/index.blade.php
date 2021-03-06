@extends('layouts.default')

@section('title', 'MyTop3')

@section('content')

    <h1 class="mb-5">
     プロフィール画像アップロード
    </h1>
    <form method="post" action="{{ url('/uploader') }}" enctype="multipart/form-data" class="form-inline">
        @csrf
        <div class="form-group">
          <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">        
          <input type="submit" value="確認画面へ" class="btn btn-info">
        </div>
          @error('image')
              <span class="text-danger">{{ $message }}</span>
          @enderror
    </form>
      <table class="table table-striped table-hover mt-5">
          <tr>
            <th class="text-center">
              <h2>{{ $user->name }}</h2>
            </th>
          </tr>
          <tr>
            @auth  
            @if (!$user->image == null)
                <td class="text-center">
                  <img src="{{ asset('/storage/' . $user->image) }}" width="200" height="200">
                </td>
            @else
              <td class="mt-4 text-center">プロフィール画像がありません</td>
            @endif
            @endauth
          </tr>
      </table>
@endsection