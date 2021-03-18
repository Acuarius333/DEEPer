<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link
            href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap"
            rel="stylesheet"
    >
    <link rel="stylesheet" href="../src/css/blog.css">



</head>

<body>
<header>
    <a href="welcome_page.php" class="site-logo" aria-label="homepage">OneUp Wine</a>
    <nav>
        <ul class="nav__list">

            <li>
                <a href="search_page.php" class="nav__link">Wines</a>
            </li>
            <li>
                <a href="#" class="nav__link">Another page</a>
            </li>
            <li>
                <a href="#" class="nav__link">Another page</a>
            </li>
            <li style="color: #7dd96e">
                <a href="blog_page.php" class="nav__link">Blog</a>
            </li>
        </ul>
    </nav>
    <?php include '../src/php/Templates/signup_login_buttons.php'; ?>
</header>

<main>
    <section class="home-intro">
        <h1>A wine romance: how to taste wine and what to eat with it.</h1>
    </section>

    <div class="home-about">
        <h2>Live the experience</h2>
        <p>Adding sight and smell to taste can do wonders for your wine-drinking experience.
            Learn to sniff and swirl like a pro with our step-by-step guide to tasting wine,
            talking about it and pairing it up with food.</p>
        <div class="columns">
            <div class="col fade-in">
                <h3>Let’s get started</h3>
                <p>
                    At the end of the day, your personal taste is what matters most when it comes to
                    deciding on your choice of wine. It’s easy to see why wine connoisseurs can be figures
                    of fun: the swirling, the sniffing, the sucking and swilling, and after all that,
                    they spit it out! What’s that all about?
                    Ultimately, it’s all part of getting as much flavour, enjoyment and information out
                    of the wine as possible – which doesn’t seem quite so bizarre. After all,  the important
                    thing to understand when tasting and drinking wine is that it’s for enjoyment.
                    And you can elevate that enjoyment with a few expert tips. So, glass at the ready and bottle
                    in hand, let’s get tasting.
                </p>
            </div>
        </div>
    </div>
    <div>
        <div class="more-stuff-grid">
            <div class="slide-in from-left">
                <h3>How to taste<hr style="width: 830px"></h3>
            </div>

            <img
                    src="../src/Images/blog_page/1.jpg"
                    alt=""
                    class="slide-in from-left"
            >

            <p class="slide-in from-right">
                We tend to serve our reds warm and our whites cold. Actually, cooling some red wines
                (depending on their starting temperature) a little will make them taste more fragrant and fruity.
                Similarly, serving white very cold can mute the aromas and flavour. Try the 20/20 guide: put
                your red in the fridge for 20 minutes before serving, and take your white out 20 minutes before.
                Make sure you have a clean glass with plenty of room to swirl so you don’t accidentally
                cover your neighbour in wine. Pour yourself a little. Don’t take a sip yet. You can learn
                a lot from the colour. For reds, a pale colour is normally a sign that the wine will be
                lighter in body. A deep colour in a white could mean that it’s oaked or has some maturity,
                and may have more complex flavours.
            </p>
        </div>
        <div class="more-stuff-grid">
            <p class="slide-in from-left">
                Now, give the wine a swirl, this opens it up and releases the aroma. Have a gentle sniff.
                Does it smell spicy or is there some vanilla? This might be a sign that the wine has spent
                time in oak barrels. Is it fruity? If so, what type of fruit? What about other aromas such
                as flowers, vegetables, honey or nuts? Finally, have a think about how strong the aroma is.
                At last, you get to take a sip, but don’t swallow straight away! Swirl it around the mouth
                so that it coats your teeth. Then with the wine still in your mouth, breath in a little.
                This will make a gurgling sound and you will feel ridiculous but this helps bring out the flavours.
                In a red wine, the first thing you might notice is the tannins, which feel like something
                you get in a strong cup of tea. Do they grip the mouth? What about the body, is it voluptuous
                like an Argentine malbec or is it light like a beaujolais?
            </p>
            <img
                    src="../src/Images/blog_page/2.jpg"
                    alt=""
                    class="slide-in from-right"
            >
        </div>
        <div class="more-stuff-grid">
            <img
                    src="../src/Images/blog_page/3.jpg"
                    alt=""
                    class="slide-in from-left"
            >
            <p class="slide-in from-right">
                In a white, notice the level of sweetness. Is it bone dry like a chablis or off-dry like a
                classic German riesling? In both red and white, there will be acidity: is the wine sharp or
                soft? Can you feel any alcoholic warmth? Look for spicy or toasty notes, a sign of oak maturation.
                Now swallow. Yes, that’s allowed you don’t have to spit unless you have dozens of wines to taste.
                Finally, it’s time to put everything together. Some pointers for what to think about:
                The length of wine in other words how long the flavours last after you’ve spat it out or
                swallowed can be a good indicator of quality. How different components, such as fruit,
                tannin, alcohol and sweetness come together; are they all in balance? Is everything harmonised?
                There’s a difference between deciding what’s a ‘good’ wine and deciding what you like. A wine could
                be impressive to some people but not be your cup of tea or, rather, glass of wine.
            </p>
        </div>
        <div class="more-stuff-grid">
            <div class="slide-in from-left">
                <h3>Food and wine matching<hr style="width: 830px"></h3>

            </div>
            <p class="slide-in from-left">
                The most important thing is don’t feel the need to be tied by traditions and
                what you think you should do. If you want to enjoy red wine with fish, then that’s fine.
                The red meat with red wine, white meat and fish with white 'rule' is much too simplistic. Instead
                look at flavours, a highly spiced beef dish is going to require a very different wine to simple
                roast beef, for example. Opposites attract: with fatty food, go for wines with high acidity, such
                as pinot noir with duck, and match salty blue cheeses with sweet wines, such as port with stilton.
                But when it comes to flavour, look for likenesses: try a buttery chicken with a buttery oaked
                chardonnay, while lemon juice loves a lemony wine such as an albariño.
                Local wine with local food: goat’s cheese, very popular in the Loire, goes perfectly with a wine,
                such as sancerre, from the same area.
            </p>
            <img
                    src="../src/Images/blog_page/4.jpg"
                    alt=""
                    class="slide-in from-right"
            >
        </div>
        <div class="more-stuff-grid">
            <img
                    src="../src/Images/blog_page/5.jpg"
                    alt=""
                    class="slide-in from-left"
            >
            <p class="slide-in from-right">
                Beware vinegar: while fish, chips and champagne are a flawless threesome, few wines stand up to
                lots of malt vinegar so be sparing on your chips. Pay attention to sugar: ideally your wine should
                always be sweeter than the dish you’re eating. Sweet puddings, then, need very sweet wines.
                Watch out for chillies: spicy food can numb the palate or make tannic wines taste bitter. We
                recommend a fruity white, ideally with a little sweetness, such as a German riesling.
                So that’s wine matching 101 ideal for enhanced appreciation and sounding like a pro in wine bars.
                But, ultimately, it’s your glass. When it comes to wine and food appreciation, as long as you’re
                enjoying it, you’re doing it right. <br></br>Cheers.
            </p>
        </div>
    </div>
</main>

<script src="../src/js/main.js"></script>

</body>
</html>