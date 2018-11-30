<section id="post-comments">
<div class="box">
    <article class="media">
        <div class="media-left">
            <figure class="image is-64x64">
                <img src="{{ $comment->user->image }}" alt="{{ $comment->user->username }}">
            </figure>
        </div>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong><a href="{{ url('user/'.$comment->user->username) }}">{{ $comment->user->username }}</a></strong>
                    <br>
                    {{ $comment->content }}
                </p>
            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    <a class="level-item" aria-label="reply">
                        <span class="icon is-small">
                            <i class="fas fa-reply" aria-hidden="true"></i>
                        </span>
                    </a>
                    <a class="level-item" aria-label="retweet">
                        <span class="icon is-small">
                            <i class="fas fa-retweet" aria-hidden="true"></i>
                        </span>
                    </a>
                    <a class="level-item" aria-label="like">
                        <span class="icon is-small">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                        </span>
                    </a>
                </div>
            </nav>
        </div>
    </article>
</div>


</section>