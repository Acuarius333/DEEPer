<?php if(isset($_SESSION ['loginId'])): ?>
    <nav>
        <ul class="nav__list">
            <li>
                <a style="position: absolute; top: 3px; left: 1163px;">Hello <span style="color: #7dd96e"><?php echo $_SESSION ['userName']; ?></span></a>
            </li>
            <li>
                <a
                    class="nav__link nav__link--btn"
                    href="#"
                >Account</a>
            </li>
            <li>
                <a
                    class="nav__link nav__link--btn nav__link--btn--highlight-logout"
                    href="../src/php/logout.php"
                >Log out</a
                >
            </li>
        </ul>
    </nav>
<?php else: ?>
    <nav>
        <ul class="nav__list">
            <li>
                <a
                    class="nav__link nav__link--btn"
                    href="register_page.php"
                >Sign up</a>
            </li>
            <li>
                <a
                    class="nav__link nav__link--btn nav__link--btn--highlight-login"
                    href="login_page.php"
                >Log in</a
                >
            </li>

        </ul>
    </nav>
<?php endif;?>