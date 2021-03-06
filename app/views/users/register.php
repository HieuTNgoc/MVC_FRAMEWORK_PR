
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - <?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/form.auth.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/model.response.msg.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?php echo URLROOT; ?>/public/js/register.js"></script>
    <script src="<?php echo URLROOT; ?>/public/js/script.js"></script>
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
                <form  method="POST" id="auth-form">
                    <div class="form-detail">
                        <div class="row">
                            <div class="label">User Name</div>
                            <div class="input">
                                <?php 
                                    if (empty($data['username_error']) && !empty($data['username'])) {
                                        echo '<input type="text" id="username" name="username" value="' . $data['username'] . '">';
                                    } else {
                                        echo '<input type="text" id="username" name="username" placeholder="Your name " required>';
                                    }
                                ?>
                            </div>
                            <span class="invalidFeedback">
                                <?php echo $data['username_error']; ?>
                            </span>
                        </div>

                        <div class="row">
                            <div class="label">Email</div>
                            <div class="input">
                                <?php 
                                    if (empty($data['email_error']) && !empty($data['email'])) {
                                        echo '<input type="text" id="email" name="email" value="' . $data['email'] . '">';
                                    } else {
                                        echo '<input type="text" id="email" name="email" placeholder="Your email " required>';
                                    }
                                ?>
                            </div>
                            <span class="invalidFeedback">
                                <?php echo $data['email_error']; ?>
                            </span>
                        </div>
                        <div class="row">
                            <div class="label">Password</div>
                            <input type="password" id="password" name="password" placeholder="Your password" required>
                            <span id="show-pass-btn" class="show-btn"><i class="material-icons">vpn_key</i></span>
                            <span class="invalidFeedback">
                                <?php echo $data['password_error'];?>
                            </span>
                        </div>

                        <div class="row">
                            <div class="label">Confirm Password</div>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                            <span id="show-pass1-btn" class="show-btn"><i class="material-icons">vpn_key</i></span>
                            <span class="invalidFeedback">
                                <?php echo $data['confirm_password_error']; ?>
                            </span>
                        </div>

                    </div>
                    <button type="submit" id="submit" >Register to start working</button>
                </form>
            </div>
        </div>
        <div class="right-background">
        </div>
        <?php require_once APPROOT . '/views/users/components/model.response.msg.alert.php'; ?>
    </div>
</body>

</html>

