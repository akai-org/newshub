@extends('layouts/base')

@section('title', 'Strona główna')

@section('head')
    <script type="text/javascript" src="{{ asset('js/voting-posts.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/alerts.js') }} "></script>
@endsection

@section('content')
    <section class="posts" style="margin-top:10px; margin-bottom:100px; margin-left:10px; margin-right:10px;">
        @foreach ($posts as $post)
            @if (Auth::check())
                @if ($vote = $post->votes->firstWhere('user_id', Auth::user()->user_id))
                    @include('layouts/post', ['post' => $post, 'url' => $post->getUrl(), 'selected' => $vote->type])
                @else
                    @include('layouts/post', ['post' => $post, 'url' => $post->getUrl()])
                @endif
            @else
                @include('layouts/post', ['post' => $post, 'url' => $post->getUrl()])
            @endif
        @endforeach
        {{ $posts->links('vendor.pagination.bulma') }}
    </section>
@endsection

@section('footer')
    @include('layouts/footer')
@endsection