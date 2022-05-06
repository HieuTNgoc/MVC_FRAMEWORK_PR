<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/home">Home</a>
        </li>
        <div>
            <?php var_dump($_SESSION); ?>
        </div>
        <li class="btn-login">
            <?php if (isLoggedIn()) : ?>
                <a href="<?php echo URLROOT; ?>/logout">Logout</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>