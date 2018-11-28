<img src="{{ $user->image }}" style="width:100px;">
<h1>
    @if (!empty($user->firstname)) $user->firstname @endif
    @if (!empty($user->lastname)) $user->lastname @endif
</h1>
<h2>{{ $user->username }}</h2>
<p>Tutaj jeszcze damy jakiś króki opis usera. Lorem ipsum dolor sit amet vero fuga!</p>
<a href="{{ url('user/'.$user->username.'/posts') }}">
    Posty ({{ $user->posts->count() }})
</a>
<a href="{{ url('user/'.$user->username.'/comments') }}">
    Komentarze ({{ $user->comments->count() }})
</a>
<a href="{{ url('user/'.$user->username.'/votes') }}">
    Plusy ({{ $user->votes_posts->where("type", "plus")->count() + $user->votes_comments->where("type", "plus")->count() }})
</a>