<form method="POST">
    <section class="login_page">

        <div class="container login-element">

            <div class="specials">
                <a class="button special-left log-form active" id="loginform">Logowanie</a>
                <a class="button special-right log-form" id="registerform">Rejestracja</a>
            </div>

            <div class="forms-login">
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="Email">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" type="password" placeholder="Password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <button class="button is-success">
                            Login
                        </button>
                    </p>
                </div>

            </div>

            <div class="forms-register">
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="Email">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>
                </div>

                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="Retype Email">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>
                </div>

                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" type="password" placeholder="Password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>
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


        </div>
    </section>



    <!--przyklad jquery do zmiany formularzy reg<->log klasa active-->

    <script async type="text/javascript">
        $("#registerform").click(function () {
            $(".forms-register").css("display", "block");
            $(".forms-login").css("display", "none");
            $("#loginform").removeClass("active");
            $("#registerform").addClass("active");
        });

        $("#loginform").click(function () {
            $(".forms-login").css("display", "block");
            $(".forms-register").css("display", "none");
            $("#registerform").removeClass("active");
            $("#loginform").addClass("active");


        });
    </script>

</form>