<section class="login_page">

    <div class="container login-element">

        <div class="specials">
            <a href="{{ route('login') }}" class="button special-left log-form">Logowanie</a>
            <a href="{{ route('register') }}" class="button special-right log-form active">Rejestracja</a>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="forms-login">
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" name="email" type="email" value="{{ old('email') }}" placeholder="Email">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>
                    @if ($errors->has('email'))
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>

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
                    <p class="control has-icons-left">
                        <input class="input" name="password_confirmation" type="password" placeholder="Confirm password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>
                    @if ($errors->has('password'))
                        <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </div>

                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" name="firstname" value="{{ old('firstname') }}" type="text" placeholder="First name">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>
                    @if ($errors->has('firstname'))
                        <p class="help is-danger">{{ $errors->first('firstname') }}</p>
                    @endif
                </div>

                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" name="lastname" value="{{ old('lastname') }}" type="text" placeholder="Last name">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>
                    @if ($errors->has('lastname'))
                        <p class="help is-danger">{{ $errors->first('lastname') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="checkbox">
                        <input type="checkbox">
                        Zapoznałem się z regulaminem i go akceptuję
                    </label>
                </div>


                <div class="field">
                    <p class="control">
                        <button class="button is-success">
                            Rejestracja
                        </button>
                    </p>
                </div>

            </div>
        </form>
    </div>
</section>