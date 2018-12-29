@extends('layouts/base')

@section('title', 'Dodaj nowy wpis')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/image-picker.css') }}">
    <script type="text/javascript" src="{{ asset('js/image-picker.min.js') }} "></script>
    <style>
        .image-resize {
            width: 100px;
        }
    </style>
@endsection


@section('content')
    @include('layouts/create_post_form')
@endsection

@section('footer')
    @include('layouts/footer')
@endsection