<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Password - <?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/form.auth.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?php echo URLROOT; ?>/public/js/script.js"></script>

</head>

<body>
    <div id="master">
        <div class="main">
            <div class="content">
                <div class="heading">
                    <img src="https://share-gcdn.basecdn.net/brand/logo.full.png" alt="Base.vn Logo" class="logo-login">
                    <h1>Password Recovery</h1>
                    <p class="sub-heading">Please enter your information. A password recovery hint will be sent to your email.</p>
                </div>
                <form action="" method="post" id="auth-form">
                    <div class="form-recover">
                        <div class="label">Email*</div>
                        <div class="row">
                            <div class="input">
                                <input type="text" id="email" name="email" placeholder="Your email "></div>
                        </div>
                    </div>
                    <div class="login-check-box">
                        <input type="checkbox" name="saved" id="saved">reCAPTCHA in here
                    </div>
                    <div id="submit">Recover password</div>
                    <div class="email-sender">
                        <div class="sender">
                            Email will be sent via <a href="" target="_blank">SendGrid</a>. Click to select another sender.
                        </div>
                    </div>
                </form>
                <div class="extra-inf">
                    <a href="./login" class="extra-option">Login now</a> if your company was already on <b>Base Account</b>
                </div>
            </div>
        </div>
        <div class="right-background">
        </div>
    </div>
</body>

</html>