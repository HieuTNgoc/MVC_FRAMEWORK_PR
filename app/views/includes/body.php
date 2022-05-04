<nav class="top-nav">
    <ul>
        <li>
            <a href="home">Home</a>
        </li>
        <div>
            <?php var_dump($_SESSION); ?>
        </div>
        <li class="btn-login">
            <?php if (isLoggedIn()) : ?>
                <a href="logout">Logout</a>
            <?php else : ?>
                <a href="login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>