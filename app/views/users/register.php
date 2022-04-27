<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Base Account</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/login.css">
</head>

<body>
    <div id="master">
        <div class="main">
            <div class="content">
                <div class="heading">
                    <img src="https://share-gcdn.basecdn.net/brand/logo.full.png" alt="Base.vn Logo" class="logo-login">
                    <h1>Register</h1>
                    <p class="sub-heading">Welcome back. Register to start working.</p>
                </div>
                <form action="<?php echo URLROOT; ?>/users/register" method="post" id="auth-form">
                    <div class="form-login">
                        <div class="row">
                            <div class="label">User Name</div>
                            <div class="input">
                                <input type="text" id="username" name="username" placeholder="Your name "></div>
                            <span class="invalidFeedback">
                                <?php echo $data['usernameError']; ?>
                            </span>
                        </div>

                        <div class="row">
                            <div class="label">Email</div>
                            <div class="input">
                                <input type="text" id="login-email" name="email" placeholder="Your email "></div>
                            <span class="invalidFeedback">
                                <?php echo $data['emailError']; ?>
                            </span>
                        </div>
                        <div class="row">
                            <div class="label">Password</div>
                            <input type="password" id="login-password" name="password" placeholder="Your password">
                            <span class="invalidFeedback">
                                <?php echo $data['passwordError']; ?>
                            </span>
                        </div>

                        <div class="row">
                            <div class="label">Confirm Password</div>
                            <input type="password" id="login-password" name="confirmPassword" placeholder="Confirm your password">
                            <span class="invalidFeedback">
                                <?php echo $data['confirmPasswordError']; ?>
                            </span>
                        </div>

                    </div>
                    <div class="submit">Register to start working</div>
                </form>
            </div>
        </div>
        <div class="right-background">
        </div>
    </div>
</body>

</html>