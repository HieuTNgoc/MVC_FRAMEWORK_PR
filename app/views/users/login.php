<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/form.auth.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/model.response.msg.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?php echo URLROOT; ?>/public/js/login.js"></script>
    <script src="<?php echo URLROOT; ?>/public/js/script.js"></script>
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
                <form method="post" id="auth-form">
                    <div class="form-detail">
                        <div class="label">Email</div>
                        <div class="row">
                            <div class="input">
                                <input type="text" id="email" name="email" placeholder="Your email " required></div>
                            <span class="invalidFeedback">
                                <?php echo $data['email_error']; ?>
                            </span>
                        </div>
                        <div class="row">
                            <div class="label">Password</div>
                            <a href="<?php echo URLROOT; ?>/recover.html" id="right-label">Forget your password?</a>
                            <input type="password" id="password" name="password" placeholder="Your password" required>
                            <span id="show-pass-btn" class="show-btn"><i class="material-icons">vpn_key</i></span>
                            <span class="invalidFeedback">
                                <?php echo $data['password_error']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="login-check-box">
                        <input type="checkbox" name="saved" id="saved" checked>
                        <label for="saved">Keep me login</label>   
                    </div>
                    <button id="submit">Login to start working</button>
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
                    <a href="<?php echo URLROOT; ?>/register">Register?</a>
                </div>
            </div>
        </div>
        <div class="right-background">
        </div>
		<?php require_once APPROOT . '/views/users/components/model.response.msg.alert.php'; ?>
    </div>
</body>

</html>