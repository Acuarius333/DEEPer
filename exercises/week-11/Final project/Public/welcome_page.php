<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OneUp Wine</title>
    <link
            href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap"
            rel="stylesheet"
    >
    <link rel="stylesheet" href="../src/css/welcome_page.css">
</head>

<body>
    <header>
        <a href="welcome_page.php" class="site-logo" aria-label="homepage">OneUp Wine</a>
        <nav class="main-nav">
            <ul class="nav__list">

                <li>
                    <a href="#" class="nav__link">About</a>
                </li>
                <li>
                    <a href="#" class="nav__link">Another page</a>
                </li>
                <li>
                    <a href="#" class="nav__link">Pricing</a>
                </li>
                <li>
                    <a href="blog_page.php" class="nav__link">Blog</a>
                </li>
            </ul>
        </nav>

        <?php if (1==1) : ?>
            <nav>
                <ul class="nav__list">
                    <li>
                        <a style="position: absolute; top: 3px; right: 90px;">Hello Francisco</a>
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
                                href="#"
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
                                href="#"
                            >Log in</a
                            >
                        </li>

                </ul>
            </nav>
        <?php endif; ?>
    </header>

    <main>
        <section class="home-intro">
            <h1>OneUp Wine</h1>
        </section>

        <div class="home-about">
            <h2>About us</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            <div class="columns">
                <div class="col fade-in">
                    <h3>Lorem, ipsum.</h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae
                        maiores fuga eos provident voluptas perferendis.
                    </p>
                </div>
                <div class="col fade-in">
                    <h3>A, illo!</h3>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Voluptatibus minima quo beatae eius blanditiis officiis.
                    </p>
                </div>
                <div class="col fade-in">
                    <h3>Repudiandae, error?</h3>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum
                        quasi quis doloribus quia illum laudantium.
                    </p>
                </div>
            </div>
        </div>
        <div>
            <div class="more-stuff-grid">
                <img
                        src="https://unsplash.it/400"
                        alt=""
                        class="slide-in from-left"
                >

                <p class="slide-in from-right">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit,
                    quae beatae vero sit magni quaerat id ratione. Dolor optio unde amet
                    omnis sapiente neque cumque consequuntur reiciendis deserunt.
                    Dolorem vero exercitationem consequuntur, eligendi cupiditate
                    debitis facilis quibusdam magni. Eveniet.
                </p>
            </div>
            <div class="more-stuff-grid">
                <p class="slide-in from-left">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit,
                    quae beatae vero sit magni quaerat id ratione. Dolor optio unde amet
                    omnis sapiente neque cumque consequuntur reiciendis deserunt.
                    Dolorem vero exercitationem consequuntur, eligendi cupiditate
                    debitis facilis quibusdam magni. Eveniet.
                </p>
                <img
                        src="https://unsplash.it/401"
                        alt=""
                        class="slide-in from-right"
                >
            </div>
            <div class="more-stuff-grid">
                <img src="//unsplash.it/400" alt="" class="slide-in from-left" />
                <p class="slide-in from-right">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit,
                    quae beatae vero sit magni quaerat id ratione. Dolor optio unde amet
                    omnis sapiente neque cumque consequuntur reiciendis deserunt.
                    Dolorem vero exercitationem consequuntur, eligendi cupiditate
                    debitis facilis quibusdam magni. Eveniet.
                </p>
            </div>
            <div class="more-stuff-grid">
                <p class="slide-in from-left">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit,
                    quae beatae vero sit magni quaerat id ratione. Dolor optio unde amet
                    omnis sapiente neque cumque consequuntur reiciendis deserunt.
                    Dolorem vero exercitationem consequuntur, eligendi cupiditate
                    debitis facilis quibusdam magni. Eveniet.
                </p>
                <img
                        src="https://unsplash.it/401"
                        alt=""
                        class="slide-in from-right"
                >
            </div>
            <div class="more-stuff-grid">
                <img src="//unsplash.it/400" alt="" class="slide-in from-left" />
                <p class="slide-in from-right">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit,
                    quae beatae vero sit magni quaerat id ratione. Dolor optio unde amet
                    omnis sapiente neque cumque consequuntur reiciendis deserunt.
                    Dolorem vero exercitationem consequuntur, eligendi cupiditate
                    debitis facilis quibusdam magni. Eveniet.
                </p>
            </div>
            <div class="more-stuff-grid">
                <p class="slide-in from-left">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit,
                    quae beatae vero sit magni quaerat id ratione. Dolor optio unde amet
                    omnis sapiente neque cumque consequuntur reiciendis deserunt.
                    Dolorem vero exercitationem consequuntur, eligendi cupiditate
                    debitis facilis quibusdam magni. Eveniet.
                </p>
                <img
                        src="https://unsplash.it/401"
                        alt=""
                        class="slide-in from-right"
                >
            </div>
        </div>
    </main>

    <script src="../src/js/main.js"></script>
</body>
</html>