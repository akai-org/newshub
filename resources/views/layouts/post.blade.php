<div class="box">
    <article class="media">
        <div class="media-left">
            <figure class="image is-256x256">
                <img src="{{ $post->imageUrl() }}" alt="Image" style="width:256px;">
            </figure>
        </div>
        <div class="media-content">
            <div class="content">
                <p>
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
                    <strong><a href="{{ $url }}">{{ $post->title }}</a></strong>
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
                </div>
            </nav>
        </div>
    </article>
</div>