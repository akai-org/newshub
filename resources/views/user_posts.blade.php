@extends('layouts/base')

@section('title', 'Użytkownik ' . $user->username . ' - Wpisy')
@section('head')
    <script type="text/javascript" src="{{ asset('js/voting-posts.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/alerts.js') }} "></script>
@endsection

@section('content')
    @include('layouts/user_banner', ['user' => $user])
@endsection

@section('footer')
    @include('layouts/footer')
@endsection