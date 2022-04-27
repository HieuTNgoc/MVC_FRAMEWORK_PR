<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Base Account</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/login.css">
</head>

<body>
    <div id="master">
        <div class="main">
            <div class="content">
                <div class="heading">
                    <img src="https://share-gcdn.basecdn.net/brand/logo.full.png" alt="Base.vn Logo" class="logo-login">
                    <h1>Login</h1>
                    <p class="sub-heading">Welcome back. Login to start working.</p>
                </div>
                <form action="<?php echo URLROOT; ?>/users/login" method="post" id="auth-form">
                    <div class="form-login">
                        <div class="label">Email</div>
                        <div class="row">
                            <div class="input">
                                <input type="text" id="login-email" name="email" placeholder="Your email "></div>
                            <span class="invalidFeedback">
                                <?php echo $data['emailError']; ?>
                            </span>
                        </div>
                        <div class="row">
                            <div class="label">Password</div>
                            <a href="recover.html" id="right-label">Forget your password?</a>
                            <input type="password" id="login-password" name="password" placeholder="Your password">
                            <span class="invalidFeedback">
                                <?php echo $data['passwordError']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="login-check-box">
                        <input type="checkbox" name="saved" id="saved">Keep me login
                    </div>
                    <div class="submit">Login to start working</div>
                    <div class="oauth">
                        <div class="label-center">
                            <span>  Or, login via single sign-on  </span>
                        </div>
                        <a href="#" class="oauth-login left">Login with Google</a>
                        <a href="#" class="oauth-login center">Login with Microsoft</a>
                        <a href="#" class="oauth-login">Login with SAML</a>
                    </div>
                </form>
                <div class="extra-inf">
                    <a href="#" class="extra-option">Login with Guest/Client access?</a>
                    <br>
                    <a href="register">Register?</a>
                </div>
            </div>
        </div>
        <div class="right-background">
        </div>
    </div>
</body>

</html>