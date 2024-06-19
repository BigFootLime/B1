
<?php

?>
<head>
    <link rel="stylesheet" type="text/css" href="login.css" />
    <link rel="stylesheet" type="text/css" href="./output.css" />
</head>
<div>

</div>
<img src="../src/assets/LOGOPHARMASYS.png">
<h3>PharmaSys, gestion de stock simplifié et efficace !</h3>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="#">
            <h1>Crée un compte</h1>
            <div class="social-container">
            <input type="text" placeholder="Email" />
            <input type="email" placeholder="Password" />
            <input type="password" placeholder="ForgetPsw" />
            <button>Sign Up</button>
        </form>
    </div>
</div>

<div class="form-container sign-in-container">
        <form action='dashboard.php' method="POST">
            <h2>Sign in</h2>
            <input type="email" placeholder="Email" />
            <input type="password" placeholder="Mot de passe" />
            <a href="#">Forgot your password?</a>
            <button type="submit" value="envoyer">Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <form class="formtrans"method="post" action="signUp.php">
                    <h1>Bonjour!</h1>
                    <p>Si vous n'avez pas de compte, venez le crée ici! </p>
                    <button class="ghost" id="signUp" type="submit"> Sign Up</button>
                </form>

            </div>
        </div>
    </div>
<!--<footer>-->
<!--    <p>-->
<!--        Created with <i class="fa fa-heart"></i> by-->
<!--        <a target="_blank" href="https://florin-pop.com">Florin Pop</a>-->
<!--        - Read how I created this and how you can join the challenge-->
<!--        <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.-->
<!--    </p>-->
<!--</footer>-->