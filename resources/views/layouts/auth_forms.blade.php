<section class="login_page">

    <div class="container login-element">

        <div class="specials">
            <a class="button special-left log-form active" id="loginform">Logowanie</a>
            <a class="button special-right log-form" id="registerform">Rejestracja</a>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="forms-login">
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" name="username" type="text" placeholder="Username">
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

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="forms-register">
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" name="email" type="email" placeholder="Email">
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
                        <input class="input" name="username" type="text" placeholder="Username">
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
                        <input class="input" name="firstname" type="text" placeholder="First name">
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
                        <input class="input" name="lastname" type="text" placeholder="Last name">
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



<!--przyklad jquery do zmiany formularzy reg<->log klasa active-->

<script async type="text/javascript">
    function loadRegisterForm() {
        $(".forms-register").css("display", "block");
        $(".forms-login").css("display", "none");
        $("#loginform").removeClass("active");
        $("#registerform").addClass("active");
    }

    function loadLoginForm() {
        $(".forms-login").css("display", "block");
        $(".forms-register").css("display", "none");
        $("#registerform").removeClass("active");
        $("#loginform").addClass("active");
    }

    @isset($action)
        @if ($action=='register')
            loadRegisterForm();
        @else
            loadLoginForm();
        @endif
    @endisset
    
    $("#registerform").click(loadRegisterForm);
    $("#loginform").click(loadLoginForm);
</script>

</form>