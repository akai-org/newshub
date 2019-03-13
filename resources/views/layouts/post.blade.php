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

    if (Auth::check()) {
        $edit_data = [
            'title' => $post->title,
            'description' => $post->description,
        ];
        if (Auth::user()->is_admin) {
            $edit_data['url'] = $post->url;
            $edit_data['image'] = $post->image;
        }
    }
@endphp
<div class="box" id="{{ $post->slug }}">
    <article class="media">
        <div class="media-left">
            <a href="{{ $url }}">
                <figure class="image is-256x256">
                    <img class="post_image" src="{{ $post->imageUrl() }}" alt="Image" style="width:200px;">
                </figure>
            </a>
        </div>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong><a href="{{ $url }}" class="post_title">{{ $post->title }}</a></strong>
                    @if ($url!=$post->url)
                    <a class="post_url" href="{{ $post->url }}">
                        <i class="fas fa-external-link-alt" style="margin-left: 5px; font-size: 12px;"></i>
                    </a>
                    @endif
                    <br>
                    <small>Autor: <a href="{{ url('user/'.$post->user->username) }}">{{ $post->user->username }}</a> -
                        {{ $post->comments->count() }} komentarzy - opublikowano {{ $post->created_at }}</small>
                </p>
                <p class="post_descripion">{{ $post->description }}</p>

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
                    <a class="level-item" aria-label="like" onclick="votePost('{{ $post->slug }}', 'plus')">
                        <span class="icon is-medium">
                            <i class="fas fa-plus-circle plus" style="font-size: 28px; color: {{ $colorPlus }};" aria-hidden="true"></i>
                        </span>
                        <span class="plus_count">{{ $post->votes->where("type", "plus")->count() }}</span>
                    </a>
                    <a class="level-item" aria-label="unlike" onclick="votePost('{{ $post->slug }}', 'minus')">
                        <span class="icon is-medium">
                            <i class="fas fa-minus-circle minus" style="font-size: 28px; color: {{ $colorMinus }};"
                                aria-hidden="true"></i>
                        </span>
                        <span class='minus_count'>{{ $post->votes->where("type", "minus")->count() }}</span>
                    </a>
                    @if (Auth::check())
                    @if (Auth::user()->is_admin || Auth::user()==$post->user)
                    <a class="level-item" onclick="editPost('{{ $post->slug }}', {{ Auth::user()->is_admin }})">
                        <span class="icon is-medium">
                            <i class="fas fa-edit" style="font-size: 28px; color: {{ $colorMinus }};" aria-hidden="true"></i>
                        </span>
                    </a>
                    @endif
                    @if (Auth::user()->is_admin)
                    <a class="level-item" onclick="deletePost('{{ $post->slug }}')">
                        <span class="icon is-medium">
                            <i class="fas fa-trash-alt" style="font-size: 28px; color: {{ $colorMinus }};" aria-hidden="true"></i>
                        </span>
                    </a>
                    @endif
                    @endif
                </div>
            </nav>
        </div>
    </article>
</div>