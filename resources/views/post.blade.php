@extends('layouts/base')

@section('content')
    <section class="posts" style="margin-top:10px; margin-bottom:100px; margin-left:10px; margin-right:10px;">
        @include('layouts/post', ['post' => $post])
    </section>
    @foreach ($post->comments as $comment)
        @include('layouts/comment', ['comment' => $comment])
    @endforeach
@endsection

@section('footer')
    @include('layouts/footer')
@endsection