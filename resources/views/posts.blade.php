@extends('layouts/base')

@section('content')
    @foreach ($posts as $post)
        @include('layouts/post', ['post' => $post])
    @endforeach
@endsection

@section('footer')
    @include('layouts/footer')
@endsection