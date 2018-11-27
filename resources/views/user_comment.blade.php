@extends('layouts/base')

@section('content')
    @include('layouts/user_banner', $user);
    @foreach ($user->comments as $comment)
        @include('layouts/comment', ['comment' => $comment])
    @endforeach
@endsection

@section('footer')
    @include('layouts/footer')
@endsection