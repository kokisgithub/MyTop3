@extends('layouts.default')

@section('title', 'MyTop3')

@section('content')

    <h1 class="mb-5">
     プロフィール画像
    </h1>
      <table class="table table-striped table-hover mt-5">
          <tr>
            <th class="text-center">
              <h2>{{ $user->name }}</h2>
            </th>
          </tr>
          <tr>
            <td class="text-center">
            画像
            </td>
        {{--
          @empty
            <td class="mt-4">プロフィール画像がありません</td>
          --}}
          </tr>
      </table>
@endsection