@extends('layouts/base')

@section('title', 'Użytkownik ' . $user->username . ' - Wpisy')

@section('content')
    @include('layouts/user_banner', ['user' => $user])
@endsection

@section('footer')
    @include('layouts/footer')
@endsection