@extends('layout')

@section('content')
<div class="nh-user">
        <div class="user-background">
        </div>
        <div class="user-avatar">
        <img src="{{ $user->image }}" alt="{{ $user->username }}">
        </div>
        <div class="user-description">
          <h2>{{ $user->username }}</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          <div class="nh-navbar-list">
            <div class="nh-navbar-item-extra">Wpisy ({{ $posts->count() }})</div>
            <div class="nh-navbar-item-extra">Komentarze (42)</div>
            <div class="nh-navbar-item-extra">Plusy (328)</div>
          </div>
        </div>
        <div class="user-options">
          <a href="#">
            <div class="button"><i class="button-icon fas fa-user-plus"></i>Dodaj</div>
          </a>
          <a href="#">
            <div class="button"><i class="button-icon fas fa-user-tag"></i>Zgłoś</div>
          </a>
        </div>
      </div>
      <div class="nh-content">
        @foreach ($posts as $post)
        <article>
            <div class="thumbnail"><a href="{{ $post->url }}"><img src="{{ $post->image }}"></a></div>
            <div class="content">
            <h2><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
            <span>Autor: <a href="/user/{{ $post->user->username }}">{{ $post->user->username }}</a> - 43 komentarze - opublikowano {{ $post->created_at }}</span>
            <p>{{ $post->description }}</p>
            </div>
            <div class="feedback">
                <a href="#"><i class="fas fa-plus-circle fa-2x"></i></a>72
                <a href="#"><i class="fas fa-minus-circle fa-2x"></i></a>14
            </div>
        </article>
    @endforeach
      </div>
@endsection