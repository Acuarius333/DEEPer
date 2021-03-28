<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OneUp Wine-Welcome</title>
    <link
            href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap"
            rel="stylesheet"
    >
    <link rel="stylesheet" href="../src/css/welcome.css">
</head>

<body>
    <header>
        <a href="welcome_page.php" class="site-logo" aria-label="homepage">OneUp Wine</a>
        <img style="z-index: -1; height: 70px; width: 70px; margin-left: 15px; margin-top: 77px; position: absolute; display: block;" src="../src/Images/icons/grapes.png" alt="">
        <nav>
            <ul class="nav__list">
                <li>
                    <a href="search_page.php" class="nav__link">Find your wine</a>
                </li>
                <li>
                    <a href="history_page.php" class="nav__link">History</a>
                </li>
                <li style="margin-right: -230px">
                    <a href="blog_page.php" class="nav__link">Blog</a>
                </li>
            </ul>
        </nav>
        <?php include '../src/php/Templates/signup_login_buttons.php'; ?>
    </header>

    <main>
        <section class="home-intro">
            <img style="height: 150px; width: 150px; margin-top: -110px; position: relative; display: inline-block; filter: drop-shadow(2px 4px 6px black);" src="../src/Images/icons/grapes.png" alt="">
            <h1>OneUp Wine</h1>
        </section>

        <div class="home-about">
            <h2>Welcome</h2>
            <p>If you are a wine lover, this is your definitive website. </p>
            <div class="columns">
                <div class="col fade-in">
                    <h3>Discover it!</h3>
                    <p>
                        You can explore the world of the wine using our searcher, where you will
                        discover a lot of specific details about the most popular wines in the world.
                    </p>
                </div>
                <div class="col fade-in">
                    <h3>Learn it!</h3>
                    <p>
                        Jump to our History section if you want to learn more about the incredible
                        history of wine. Did you know the oldest wine archaeological remains has been proven
                        to date back 9000 years? Enter and discover much more.
                    </p>
                </div>
                <div class="col fade-in">
                    <h3>Taste it!</h3>
                    <p>
                        Did you ever wanted to discover how to taste a good wine? What to eat with?
                        Do you want to impress to your family and friends becoming a wine tester?
                        Come to our Blog section and come across our complete guide.
                    </p>
                </div>
            </div>
        </div>
        <div>
            <div class="more-stuff-grid">
                <img
                        src="../src/Images/welcome_page/6.jpeg"
                        alt=""
                        class="slide-in from-left"
                        style="box-shadow: 10px 10px 5px #181717"
                >

                <p class="slide-in from-right">
                    Wine is passion, the better acquainted you are and the more you love
                    it. Thus the desire to disclose it, to discover it, to talk together
                    about it, to discuss it among friends becomes paramount. A wine tasting
                    can be seen as a team-building activity as it increases the ability to
                    relate. It will be our pleasure to recount the history, interesting
                    tidbits related to the different regions, to the legends, to our
                    outstanding wines. Special importance is given to a tasting of local
                    wines, wines that combined with our typical products cannot help but
                    thrill us.
                </p>
            </div>
            <div class="more-stuff-grid">
                <p class="slide-in from-left">
                    When we say that “wine is culture” we are not just repeating a tremendous
                    cliché, we are stating a simple truth. Wine is not merely vineyards and
                    cellars – but also history and art. It is an important constituent of a
                    people’s culture, meaningful as well as symbolic.
                </p>
                <img
                        src="../src/Images/welcome_page/1.jpeg"
                        alt=""
                        class="slide-in from-right"
                        style="box-shadow: 10px 10px 5px #181717"
                >
            </div>
            <div class="more-stuff-grid">
                <img src="../src/Images/welcome_page/4.jpg" alt="" class="slide-in from-left" style="box-shadow: 10px 10px 5px #181717"/>
                <p class="slide-in from-right">
                    Wine is art, an ancient art improved generation after generation. The
                    uncorking of a bottle of wine is a music repeated a thousand times, and
                    a thousand times longed to hear again. The silhouette of a bottle is the
                    curvature of pleasure that spills out and evades us to other times.
                </p>
            </div>
            <div class="more-stuff-grid">
                <p class="slide-in from-left">
                    Wine tells a story about where it comes from. Speaking of flavor, unlike
                    any other beverage, wine tends to “soak up” the earth. In other words,
                    what you drink reflects the environment, the climate, and the geography
                    of the land from which the grapes are harvested. Experts can taste a wine
                    and accurately visualize and describe exactly where it comes from. That’s
                    what the French call “terroir”. It’s become a buzzword, but it simply is
                    the characteristic taste and flavor imparted to a wine by the environment
                    from which it came.
                </p>
                <img
                        src="../src/Images/welcome_page/5.jpg"
                        alt=""
                        class="slide-in from-right"
                        style="box-shadow: 10px 10px 5px #181717"
                >
            </div>
            <div class="more-stuff-grid">
                <img src="../src/Images/welcome_page/3.jpeg" alt="" class="slide-in from-left" style="box-shadow: 10px 10px 5px #181717"/>
                <p class="slide-in from-right">
                    One of the beauty of wine is that it makes food taste better. If you have
                    the right match, then both the flavor of the wine and the food enhance each
                    other — and that’s pretty incredible. There is a great satisfaction in
                    pairing wine and food flavors, and trying to do so in such a way that it
                    provides pleasure to both you and your guests. Just as with people, when
                    it comes to wine and food pairing, some matches are made in heaven.
                </p>
            </div>
        </div>
    </main>

    <?php include '../src/php/Templates/footer.php'; ?>

    <script src="../src/js/main.js"></script>
</body>
</html>