@extends('layouts/base')

@section('title', 'Użytkownik ' . $user->username . ' - Wpisy')

@section('content')
    @include('layouts/user_banner', $user)
    @foreach ($user->posts as $post)
        @include('layouts/post', ['post' => $post, 'url' => $post->getUrl()])
    @endforeach
@endsection

@section('footer')
    @include('layouts/footer')
@endsection