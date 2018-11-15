@extends('layouts/base')

@section('content')
    @foreach ($posts as $post)
        @include('layouts/post', ['post' => $post])
    @endforeach
@endsection