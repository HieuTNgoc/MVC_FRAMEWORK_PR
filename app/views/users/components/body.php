<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/home">Home</a>
        </li>
        <br>
        <li>
            <a href="<?php echo URLROOT; ?>/register">Register</a>
        </li>
        <br>
        <li class="btn-login">
            <?php if (isLoggedIn()) : ?>
                <a href="<?php echo URLROOT; ?>/logout">Logout</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/login">Login</a>
            <?php endif; ?>
        </li>
        <br>
        <li>
            <a href="<?php echo URLROOT; ?>/account">Account</a>
        </li>
    </ul>
</nav>