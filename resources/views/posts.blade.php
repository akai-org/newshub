@extends('layout')

@section('content')
<main class="nh-content">
    @foreach ($posts as $post)
        <article>
            <div class="thumbnail"><a href="{{ $post->url }}"><img src="{{ $post->image }}"></a></div>
            <div class="content">
            <h2><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
            <span>Autor: {{ $post->user->username }} - 43 komentarze - opublikowano {{ $post->created_at }}</span>
            <p>{{ $post->description }}</p>
            </div>
            <div class="feedback">
                <a href="#"><i class="fas fa-plus-circle fa-2x"></i></a>72
                <a href="#"><i class="fas fa-minus-circle fa-2x"></i></a>14
            </div>
        </article>
    @endforeach
</main>
@endsection