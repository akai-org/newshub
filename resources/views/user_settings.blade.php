@extends('layouts/base')

@section('title', 'Użytkownik ' . $user->username . ' - Ustawienia')


@if (isset(Auth::user()->username ) && $user->username == Auth::user()->username)
@section('content')
    @include('layouts/user_settings', ['user' => $user])
@endsection
@else
    404
@endif
