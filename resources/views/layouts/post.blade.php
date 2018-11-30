<div class="box">
    <article class="media">
        <div class="media-left">
            <figure class="image is-256x256">
                <img src="{{ $post->image }}" alt="Image" style="width:256px;">
            </figure>
        </div>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong><a href="{{ $post->url }}">{{ $post->title }}</a></strong>
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
                    <a class="level-item" aria-label="like">
                        <span class="icon is-small">
                            <i class="fas fa-thumbs-up" aria-hidden="true"></i>
                        </span>
                        {{ $post->votes->where("type", "plus")->count() }}
                    </a>
                    <a class="level-item" aria-label="unlike">
                        <span class="icon is-small">
                            <i class="fas fa-thumbs-down" aria-hidden="true"></i>
                        </span>
                        {{ $post->votes->where("type", "minus")->count() }}
                    </a>
                </div>
            </nav>
        </div>
    </article>
</div>