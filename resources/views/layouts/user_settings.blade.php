<section id="profile" class="profile">
    <div class="box">
      <div class="user-back" style="background-image: url('https://images.pexels.com/photos/531880/pexels-photo-531880.jpeg?cs=srgb&dl=background-blur-clean-531880.jpg&fm=jpg');">
      <img src="https://www.gravatar.com/avatar/{{ md5($user->email) }}?d={{ urlencode("https://www.gravatar.com/avatar")}}&s=150" class="user-logo" />
  
   <div class="user-buttons">
  
    @if (isset(Auth::user()->username ) && $user->username == Auth::user()->username)
    
    <a class="button social" href="{{ url('user/'.$user->username.'/settings') }}">
            <span class="icon">
              <i class="fa fa-cog"></i>
            </span>
  
          </a>
    @else
        <a class="button social">
          <span class="icon">
            <i class="fab fa-facebook"></i>
          </span>
  
        </a>
        <a class="button social">
          <span class="icon">
            <i class="fab fa-github"></i>
          </span>
  
        </a>
        <a class="button social">
          <span class="icon">
            <i class="fab fa-twitter"></i>
          </span>
  
        </a>
        <a class="button social">
          <span class="icon">
            <i class="fab fa-stack-overflow"></i>
          </span>
  
        </a>
        
    @endif     
  
        </div>
      </div>
  
  
      <h3 class="username is-size-3" style="display:inline-block;">{{$user->username }}</h3> 
      <small style="margin-left:10px;">
      
      @if (!empty($user->firstname)) {{ $user->firstname }} @endif
      @if (!empty($user->lastname)) {{ $user->lastname }} @endif 
      </small>
      <p>{{$user->description}}</p>
  
      <div class="tabs" style="margin-top:1.5rem;">
        <ul>
  
          <li>
            <a href="{{ url('user/'.$user->username.'/posts') }}">Wpisy ({{ $user->posts->count() }})</a></li>
          <li><a>Komentarze ({{ $user->comments->count() }})</a></li>
          <li><a>Plusy ({{ $user->votes_posts->where("type", "plus")->count() + $user->votes_comments->where("type",
              "plus")->count() }})</a></li>
  
  
        </ul>
      </div>
      
  
      <div class="user-profile">
          <form method="POST" action="{{ route('user_settings') }}">
              {{ csrf_field() }}
        <h3 class="is-size-3">Ustawienia użytkownika</h3>
        <label class="label">Imię i nazwisko</label>
        <div class="field is-grouped">
            
            <div class="control">
              <input class="input" name="name" type="text" value="{{$user->firstname}}">
              
            </div>
          
  
        <div class="control">
          <input class="input" name="surname" type="text" value="{{$user->lastname}}">
          
        </div>
      </div>

      <div class="field">
        <label class="label">Email</label>
        <div class="control">
          <input class="input" name="email" type="email" value="{{$user->email}}">
          
        </div>
      </div>
<div class="field">
    <label class="label">Opis</label>
    <div class="control">
      <textarea class="textarea" name="desc" placeholder="Twój ekstra opis">{{$user->description}}</textarea>
    </div>
  </div>
  @if ($errors->has('name'))
        <p class="help is-danger">{{ $errors->first('name') }}</p>
       @endif
@if ($errors->has('surname'))
<p class="help is-danger">{{ $errors->first('surname') }}</p>
@endif
@if ($errors->has('email'))
<p class="help is-danger">{{ $errors->first('email') }}</p>
@endif
@if ($errors->has('desc'))
<p class="help is-danger">{{ $errors->first('desc') }}</p>
@endif
  <div class="field">
        <div class="control">
                <button class="button is-primary">Zapisz</button>
              </div>

  </div>
          </form>

  <hr>


  <h3 class="is-size-3">Zmiana Hasła</h3>
  
<form method="POST" action="{{ route('user_settings') }}">
        {{ csrf_field() }}
  <label class="label">Obecne Hasło:</label>
  <div class="control">
        <input class="input" type="password" name="oldpassword" placeholder="Obecne hasło">
        
  </div>
  @if ($errors->has('oldpassword'))
  <p class="help is-danger">{{ $errors->first('oldpassword') }}</p>
 @endif
  <label class="label">Nowe Hasło:</label>
  
  <div class="field is-grouped">
      
      <div class="control">
        <input class="input" type="password" name="newpassword" placeholder="Nowe hasło">
        
      </div>
      

  <div class="control">
    <input class="input" type="password" name="newpasswordrepeat" placeholder="Powtórz Nowe Hasło">
    
  </div>
 
</div>
@if ($errors->has('newpassword'))
        <p class="help is-danger">{{ $errors->first('newpassword') }}</p>
       @endif
@if ($errors->has('newpasswordrepeat'))
<p class="help is-danger">{{ $errors->first('newpasswordrepeat') }}</p>
@endif
<div class="field">
        <div class="control">
                <button class="button is-primary">Zapisz</button>
              </div>

  </div>
</form>

  </div>
  
  
    </div>
  </section>