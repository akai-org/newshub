@extends('layouts/base')

@section('title', 'Nowy wpis')

@section('content')
    @if (isset($new_post))
        @include('layouts/create_post_form')
    @else
        @include('layouts/new_post_form')
    @endif
@endsection

@section('footer')
    @include('layouts/footer')
@endsection