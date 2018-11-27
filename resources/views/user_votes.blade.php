@extends('layouts/base')

@section('content')
    @include('layouts/user_banner', $user);
    @foreach ($user->posts as $post)
        @include('layouts/post', ['post' => $post])
    @endforeach
@endsection

@section('footer')
    @include('layouts/footer')
@endsection