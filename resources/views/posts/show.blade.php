@extends('layouts.default')

@section('title', $post->title)

@section('content')
    <h1>
    <a href="{{ url('/') }}" class="float-right btn btn-outline-primary">戻る</a>
    {{ $post->title }}
    </h1>
    <p class="mt-4">{!! nl2br(e($post->body)) !!} </p>
@endsection
