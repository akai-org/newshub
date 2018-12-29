@php
    if (!isset($url)) {
        $url = $post->url;
    }
    $colorPlus = "#b6a7a8";
    $colorMinus = "#b6a7a8";
    if (isset($selected)) {
        if ($selected=="plus") $colorPlus = "black";
        if ($selected=="minus") $colorMinus = "black";
    }
@endphp
<div class="box">
    <article class="media">
        <div class="media-left">
            <a href="{{ $url }}">
                <figure class="image is-256x256">
                    <img src="{{ $post->imageUrl() }}" alt="Image" style="width:200px;">
                </figure>
            </a>
        </div>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong><a href="{{ $url }}">{{ $post->title }}</a></strong>
                    @if ($url!=$post->url) 
                        <a href="{{ $post->url }}">
                            <i class="fas fa-external-link-alt" style="margin-left: 5px; font-size: 12px;"></i>
                        </a>
                    @endif
                    <br>
                <small>Autor: <a href="{{ url('user/'.$post->user->username) }}">{{ $post->user->username }}</a> - {{ $post->comments->count() }} komentarzy - opublikowano {{ $post->created_at }}</small>
                </p>
                {{ $post->description }}

            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    {{--
                    <a class="level-item" aria-label="reply">
                        <span class="icon is-small">
                            <i class="fas fa-reply" aria-hidden="true"></i>
                        </span>
                    </a>
                    <a class="level-item" aria-label="retweet">
                        <span class="icon is-small">
                            <i class="fas fa-comments" aria-hidden="true"></i>
                        </span>
                    </a>
                    --}}
                <a class="level-item" aria-label="like" id="plus-{{ $post->slug }}" onclick="votePost('{{ $post->slug }}', 'plus')">
                        <span class="icon is-medium">
                            <i class="fas fa-plus-circle" style="font-size: 28px; color: {{ $colorPlus }};" aria-hidden="true"></i>
                        </span>
                        <span class="plus">{{ $post->votes->where("type", "plus")->count() }}</span>
                    </a>
                    <a class="level-item" aria-label="unlike" id="minus-{{ $post->slug }}" onclick="votePost('{{ $post->slug }}', 'minus')">
                        <span class="icon is-medium">
                                <i class="fas fa-minus-circle" style="font-size: 28px; color: {{ $colorMinus }};" aria-hidden="true"></i>
                        </span>
                        <span class='minus'>{{ $post->votes->where("type", "minus")->count() }}</span>
                    </a>
                    @if (Auth::check() && Auth::user()->is_admin)
                        <form method="POST" action="{{ action("PostController@destroy", $post) }}">
                            @method('DELETE')
                            @csrf
                            <a href="#" class="level-item" onclick="$(this).closest('form').submit()">
                                <span class="icon is-medium">
                                        <i class="fas fa-trash-alt" style="font-size: 28px; color: {{ $colorMinus }};" aria-hidden="true"></i>
                                </span>
                            </a>
                        </form>
                    @endif
                </div>
            </nav>
        </div>
    </article>
</div>