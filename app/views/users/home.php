<?php
	require_once APPROOT . '/views/users/components/head.php';
?>

<div id="section-landing" class='top-nav'>
	<?php
		require_once APPROOT . '/views/users/components/body.php';
	?>
	<?php if (isset($_SESSION['username'])) echo '<h1>Hello</h1><h2>User: @' .$_SESSION['username'].'</h2>';?>
</div>