<section class="login_page">

    <div class="container login-element">

        <div class="specials">
            <a href="{{ route('login') }}" class="button special-left log-form active" id="loginform">Logowanie</a>
            <a href="{{ route('register') }}" class="button special-right log-form" id="registerform">Rejestracja</a>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="forms-login">
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" name="username" value="{{ old('username') }}" type="text" placeholder="Username">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>
                    @if ($errors->has('username'))
                        <p class="help is-danger">{{ $errors->first('username') }}</p>
                    @endif
                </div>
                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" name="password" type="password" placeholder="Password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>
                    @if ($errors->has('password'))
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="field">
                    <p class="control">
                        <button class="button is-success">
                            Login
                        </button>
                    </p>
                </div>

            </div>
        </form>
    </div>
</section>

</form>