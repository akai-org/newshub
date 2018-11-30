<section id="profile" class="profile">
  <div class="box">
    <div class="user-back" style="background-image: url('https://images.pexels.com/photos/531880/pexels-photo-531880.jpeg?cs=srgb&dl=background-blur-clean-531880.jpg&fm=jpg');">
      <img src="{{ $user->image }}" class="user-logo" />

      <div class="user-buttons">

        <a class="button social">
          <span class="icon">
            <i class="fab fa-facebook"></i>
          </span>

        </a>
        <a class="button social">
          <span class="icon">
            <i class="fab fa-twitter"></i>
          </span>

        </a>
        <a class="button social">
          <span class="icon">
            <i class="fab fa-linkedin"></i>
          </span>

        </a>
        <a class="button social">
          <span class="icon">
            <i class="fab fa-github"></i>
          </span>

        </a>

      </div>
    </div>


    <h3 class="username is-size-3" style="display:inline-block;">{{$user->username }}</h3> 
    <small style="margin-left:10px;">
    
    @if (!empty($user->firstname)) $user->firstname @endif
    @if (!empty($user->lastname)) $user->lastname @endif 
    </small>
    <p>Tutaj jeszcze damy jakiś króki opis usera. Lorem ipsum dolor sit amet vero fuga!</p>

    <div class="tabs" style="margin-top:1.5rem;">
      <ul>

        <li class="is-active">
          <a href="{{ url('user/'.$user->username.'/posts') }}">Wpisy ({{ $user->posts->count() }})</a></li>
        <li><a>Komentarze ({{ $user->comments->count() }})</a></li>
        <li><a>Plusy ({{ $user->votes_posts->where("type", "plus")->count() + $user->votes_comments->where("type",
            "plus")->count() }})</a></li>


      </ul>
    </div>
    

    <div class="user-profile">
      <div class="level">


        <div class="level-item">

          <!--content wczytywany-->
          
  


        </div>

      </div>

    </div>


  </div>
</section>