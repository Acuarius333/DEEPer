<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OneUp Wine-History</title>
    <link
            href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap"
            rel="stylesheet"
    >
    <link rel="stylesheet" href="../src/css/history.css">

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
            <li style="color: #32CD32">
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
        <a style="font-size: 30px">A story of tradition, <span style="color: limegreen">History</span> and passion</a>
    </section>

    <div class="home-about">
        <h2>Where did wine come from? The true origin of wine</h2>
        <p>Where did wine come from? It wasn’t France. Nor was it Italy. Vitis vinifera,
            also known as “the common wine grape,” has an unexpected homeland! Let’s dive
            into the origin of wine.</p>
        <div class="columns">
            <div class="col fade-in">
                <h3>The hidden roots</h3>
                <p>
                    Current evidence suggests that wine originated in West Asia including Caucasus Mountains,
                    Zagros Mountains, Euphrates River Valley, and Southeastern Anatolia. This area spans a large
                    area that includes the modern day nations of Armenia, Azerbaijan, Georgia, northern Iran,
                    and eastern Turkey.<br><br>
                    Ancient wine production evidence dates between 6,000 BC and 4,000 BC, and includes an ancient
                    winery site in Armenia, grape residue found in clay jars in Georgia, and signs of grape
                    domestication in eastern Turkey. We still haven’t pin-pointed the specific origin of wine, but
                    we think we know who made it!<br><br>
                    The Shulaveri-Shomu people (or “Shulaveri-Shomutepe Culture”) are thought to be the earliest
                    people making wine in this area. This was during the Stone Age (neolithic period) when people
                    used obsidian for tools, raised cattle and pigs, and most importantly, grew grapes. Here are some
                    examples of what we’ve learned about the origin of wine.
                </p>
            </div>
        </div>
    </div>
    <div>
        <div class="more-stuff-grid">
            <div class="slide-in from-left">
                <h3>Wine in prehistory<hr style="width: 830px"></h3>
            </div>

            <img
                    src="../src/Images/history_page/1.jpeg"
                    alt=""
                    class="slide-in from-left"
                    style="box-shadow: 10px 10px 5px #181717"
            >

            <p class="slide-in from-right">
                Organic compounds found in ancient Georgian pottery link winemaking to an area in the
                Southern Caucasus. The pottery vessels, called Kvevri (or Qvevri), can still be found in
                modern winemaking in Georgia today!
                By studying grape genetics, José Vouillimoz (a grape “ampelologist”), identified a region
                in Turkey where wild grape vines closely resemble cultivated vines. This research supports
                a theory that a convergence zone between cultivated and wild vines could be the origin
                place of winemaking!
                The oldest known winery (4,100 BC) exists in group of caves outside the Armenian village of
                Areni. The village is still known for winemaking and makes red wines with a local grape also
                called Areni. Areni is thought to be quite old and you can still drink it today!
            </p>
        </div>
        <div class="more-stuff-grid">
            <p class="slide-in from-left">
                Greek mythology placed the childhood of Dionysus and his discovery of viticulture at Mount
                Nysa but had him teach the practice to the peoples of central Anatolia. Because of this,
                he was rewarded to become a god of wine.
                In Persian legend, King Jamshid banished a lady of his harem, causing her to become despondent
                and contemplate suicide. Going to the king's warehouse, the woman sought out a jar marked
                "poison" containing the remnants of the grapes that had spoiled and were now deemed undrinkable.
                After drinking the fermented wine, she found her spirits lifted. She took her discovery to the
                king, who became so enamored of his new drink that he not only accepted the woman back but also
                decreed that all grapes grown in Persepolis would be devoted to winemaking.
            </p>
            <img
                    src="../src/Images/history_page/5.jpeg"
                    alt=""
                    class="slide-in from-right"
                    style="box-shadow: 10px 10px 5px #181717"
            >
        </div>
        <div class="more-stuff-grid">
            <img
                    src="../src/Images/history_page/3.jpeg"
                    alt=""
                    class="slide-in from-left"
                    style="box-shadow: 10px 10px 5px #181717"
            >
            <p class="slide-in from-right">
                Much of modern wine culture derives from the practices of the ancient Greeks. The vine preceded both the Minoan
                and Mycenaean cultures. Many of the grapes grown in modern Greece are grown there exclusively and are similar or
                identical to the varieties grown in ancient times. Several ancient sources, such as the Roman Pliny the
                Elder, describe the ancient Greek method of using partly dehydrated gypsum before fermentation and some type of
                lime after, in order to reduce the acidity of the wine. The Greek Theophrastus provides the oldest known description
                of this aspect of Greek winemaking. In Homeric mythology, wine is usually served in "mixing bowls" rather than
                consumed in an undiluted state. Dionysus, the Greek god of revelry and wine—frequently referred to in the works of
                Homer and Aesop—was sometimes given the epithet Acratophorus, "giver of unmixed wine".
            </p>
        </div>
        <div class="more-stuff-grid">
            <p class="slide-in from-left">
                Winemaking technology and wine culture are rooted in Chinese history and the definition of "New New World" is a
                misnomer that imparts a Euro centric bias onto wine history and ignores fact. Furthermore, the history of Chinese
                grape wine has been confirmed and proven to date back 9000 years (7000 BC). The Jiahu discovery
                illustrates how you should never give up hope in finding chemical evidence for a fermented beverage from the
                Palaeolithic period. Research very often has big surprises in store. We might think that the grape wines of Hajji
                Firuz, the Caucasus, and eastern Anatolia would prove to be the earliest alcoholic beverages in the world, coming
                from the so-called Cradle of Civilization in the Near East as they do. But there are evidences that proved to
                be even earlier–from around 7000 BC.
            </p>
            <img
                    src="../src/Images/history_page/7.jpeg"
                    alt=""
                    class="slide-in from-right"
                    style="box-shadow: 10px 10px 5px #181717"
            >
        </div>
        <div class="more-stuff-grid">
            <img
                    src="../src/Images/history_page/2.jpeg"
                    alt=""
                    class="slide-in from-left"
                    style="box-shadow: 10px 10px 5px #181717"
            >
            <p class="slide-in from-right">
                The Roman Empire had an immense impact on the development of viticulture and oenology. Wine was an integral part of
                the Roman diet and winemaking became a precise business. Virtually all of the major wine-producing regions of Western
                Europe today were established during the Roman Imperial era. During the Roman Empire, social norms began to shift as
                the production of alcohol increased. Further evidence suggests that widespread drunkenness and true alcoholism among
                the Romans began in the first century BC and reached its height in the first century AD. Viniculture expanded so
                much that by AD c.92 the emperor Domitian was forced to pass the first wine laws on record, banning the planting of
                any new vineyards in Italy and uprooting half of the vineyards in the provinces in order to increase the production
                of the necessary but less profitable grain.
            </p>

        </div>

        <div class="more-stuff-grid">
            <div class="slide-in from-left">
                <h3>Medieval period<hr style="width: 830px"></h3>

            </div>
            <p class="slide-in from-left">
                In the Middle Ages, wine was the common drink of all social classes in the south, where grapes were cultivated. In the
                north and east, where few if any grapes were grown, beer and ale were the usual beverages of both commoners and nobility.
                Wine was exported to the northern regions, but because of its relatively high expense was seldom consumed by the lower
                classes. Since wine was necessary, however, for the celebration of the Catholic Mass, assuring a supply was crucial.
                The Benedictine monks became one of the largest producers of wine in France and Germany, followed closely by the Cistercians.
                Other orders, such as the Carthusians, the Templars, and the Carmelites, are also notable both historically and in modern
                times as wine producers.
            </p>
            <img
                    src="../src/Images/history_page/4.jpeg"
                    alt=""
                    class="slide-in from-right"
                    style="box-shadow: 10px 10px 5px #181717"
            >
        </div>
        <div class="more-stuff-grid">
            <img
                    src="../src/Images/history_page/8.jpeg"
                    alt=""
                    class="slide-in from-left"
                    style="box-shadow: 10px 10px 5px #181717"
            >
            <p class="slide-in from-right">
                The Benedictines owned vineyards in Champagne (Dom Perignon was a Benedictine monk), Burgundy, and Bordeaux in France,
                and in the Rheingau and Franconia in Germany. In 1435 Count John IV of Katzenelnbogen, a wealthy member of the Holy Roman
                high nobility near Frankfurt, was the first to plant Riesling, the most important German grape. The nearby winemaking
                monks made it into an industry, producing enough wine to ship all over Europe for secular use. In Portugal, a country
                with one of the oldest wine traditions, the first appellation system in the world was created. As wines were kept in barrels,
                they were not extensively aged, and thus drunk quite young. To offset the effects of heavy alcohol consumption, wine was
                frequently watered down at a ratio of four or five parts water to one of wine.
            </p>
        </div>
        <div class="more-stuff-grid">
            <div class="slide-in from-left">
                <h3>Modern era<hr style="width: 830px"></h3>

            </div>
            <p class="slide-in from-left">
                European grape varieties were first brought to what is now Mexico by the first Spanish conquistadors to provide the necessities
                of the Catholic Holy Eucharist. Planted at Spanish missions, one variety came to be known as the Mission grape and is still
                planted today in small amounts. Succeeding waves of immigrants imported French, Italian and German grapes, although wine from
                those native to the Americas (whose flavors can be distinctly different) is also produced. Mexico became the most important
                wine producer starting in the 16th century, to the extent that its output began to affect Spanish commercial production. In
                this competitive climate, the Spanish king sent an executive order to halt Mexico's production of wines and the planting of
                vineyards.
            </p>
            <img
                    src="../src/Images/history_page/6.jpeg"
                    alt=""
                    class="slide-in from-right"
                    style="box-shadow: 10px 10px 5px #181717"
            >
        </div>
        <div class="more-stuff-grid">
            <img
                    src="../src/Images/history_page/9.jpeg"
                    alt=""
                    class="slide-in from-left"
                    style="box-shadow: 10px 10px 5px #181717"
            >
            <p class="slide-in from-right">
                In the late 19th century, the phylloxera louse brought widespread destruction to grapevines, wine production, and those whose
                livelihoods depended on them; far-reaching repercussions included the loss of many indigenous varieties. Lessons learned from
                the infestation led to the positive transformation of Europe's wine industry. Bad vineyards were uprooted and their land turned
                to better uses. Some of France's best butter and cheese, for example, is now made from cows that graze on Charentais soil, which
                was previously covered with vines. Cuvées were also standardized, important in creating certain wines as they are known today;
                Champagne and Bordeaux finally achieved the grape mixes that now define them.
            </p>
        </div>
    </div>
</main>

<?php include '../src/php/Templates/footer.php'; ?>

<script src="../src/js/main.js"></script>
</body>
</html>