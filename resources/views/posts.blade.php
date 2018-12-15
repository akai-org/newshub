@extends('layouts/base')

@section('title', 'Strona główna')

@section('head')
    <script type="text/javascript" src="{{ asset('js/voting-posts.js') }} "></script>
@endsection

@section('content')
    <section class="posts" style="margin-top:10px; margin-bottom:100px; margin-left:10px; margin-right:10px;">
        @foreach ($posts as $post)
            @include('layouts/post', ['post' => $post, 'url' => $post->getUrl()])
        @endforeach
    </section>
@endsection

@section('footer')
    @include('layouts/footer')
@endsection