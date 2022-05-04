<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Base Account</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/register.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./public/js/javascript.js"></script>
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
                <form action="./register" method="POST" id="auth-form">
                    <div class="form-login">
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
                                        echo '<input type="text" id="login-email" name="email" value="' . $data['email'] . '">';
                                    } else {
                                        echo '<input type="text" id="login-email" name="email" placeholder="Your email " required>';
                                    }
                                ?>
                            </div>
                            <span class="invalidFeedback">
                                <?php echo $data['email_error']; ?>
                            </span>
                        </div>
                        <div class="row">
                            <div class="label">Password</div>
                            <input type="password" id="login-password" name="password" placeholder="Your password" required>
                            <span class="invalidFeedback">
                                <?php echo $data['password_error'];?>
                            </span>
                        </div>

                        <div class="row">
                            <div class="label">Confirm Password</div>
                            <input type="password" id="login-password" name="confirm_password" placeholder="Confirm your password" required>
                            <span class="invalidFeedback">
                                <?php echo $data['confirm_password_error']; ?>
                            </span>
                        </div>

                    </div>
                    <button class="submit" onclick="submit_form()">Register to start working</button>
                </form>
            </div>
        </div>
        <div class="right-background">
        </div>
    </div>
</body>

</html>