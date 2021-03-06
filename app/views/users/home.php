<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home - <?php echo SITENAME; ?></title>
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/page.home.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?php echo URLROOT; ?>/public/js/script.js"></script>

</head>

<body>
	<h1 class='top-nav'>Welcome to Base Account</h1>
	<div id="section-landing" class='top-nav'>
		<nav class="top-nav">
			<ul>
				<li>
					<a href="<?php echo URLROOT; ?>/home">Home</a>
				</li>
				<br><br>
				<li>
					<a href="<?php echo URLROOT; ?>/register">Register</a>
				</li>
				<br><br>
				<li>
					<a href="<?php echo URLROOT; ?>/recover">Recover</a>
				</li>
				<br><br>
				<li class="btn-login">
					<?php if (isset($_SESSION['username'])) : ?>
						<a href="<?php echo URLROOT; ?>/logout/executeLogout">Logout</a>
					<?php else : ?>
						<a href="<?php echo URLROOT; ?>/login">Login</a>
					<?php endif; ?>
				</li>
				<br><br>
				<li>
					<a href="<?php echo URLROOT; ?>/account">Account</a>
				</li>
			</ul>
		</nav>
		<?php if (isset($_SESSION['username'])) echo '<h1>Hello</h1><h2>User: @' . $_SESSION['username'] . '</h2>'; ?>
	</div>
</body>

</html>