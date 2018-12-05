@extends('layouts/base')

@section('title', $post->title)
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-comments.css') }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script type="text/javascript" src="{{ asset('js/jquery-comments.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/moment-with-locales.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/jquery.textcomplete.min.js') }} "></script>
@endsection

@section('content')
    <section class="posts" style="margin-top:10px; margin-bottom:100px; margin-left:10px; margin-right:10px;">
        @include('layouts/post', ['post' => $post])
    </section>
    {{-- @foreach ($post->comments as $comment)
        @include('layouts/comment', ['comment' => $comment])
    @endforeach --}}
    @include('layouts/comments', ['comments' => $post->comments, 'post' => $post])
@endsection

@section('footer')
    @include('layouts/footer')
@endsection