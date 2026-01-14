<?php
/**
 * Media Page
 * Video interviews and written articles about the author
 */

$page_title = 'Медиуми - Илиески';
$page_description = 'Гледајте видео интервјуа и читајте статии за Јован Илиески. Истражете медиумска покриеност и прес објави.';
$page_keywords = 'медиуми, интервјуа, видеа, статии, преса, покриеност';
$page_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

include 'includes/header.php';
?>

<main>
    <section class="media-section">
        <div class="container">
            <div class="section-title">
                <h2>Медиуми & Интервјуа</h2>
                <p>Видео интервјуа и напишани статии за авторот</p>
            </div>
            
            <!-- Video Interviews Section -->
            <div class="media-subsection">
                <h3>Видео интервјуа:</h3>
                <div class="videos-grid">
                    <?php
                    $videos = [
                        'https://www.youtube.com/watch?v=YtcmifzQz04&t=346s',
                        'https://www.youtube.com/watch?v=p5nISKbxZvI',
                        'https://www.youtube.com/watch?v=NctJv9ZSXYQ&t=860s',
                        'https://www.youtube.com/watch?v=DpyU1I-TM08&t=1009s',
                        'https://www.youtube.com/watch?v=nbx6flwqicc&t=957s',
                        'https://www.youtube.com/watch?v=OpCuMZxFrK0',
                        'https://www.youtube.com/watch?v=WajPbvYr1aM&t=1152s',
                        'https://www.youtube.com/watch?v=WfKUxrARN2c',
                        'https://www.youtube.com/watch?v=jCHghQoYPN0&t=302s',
                        'https://www.youtube.com/watch?v=6PWhORJgZMg',
                        'https://www.youtube.com/watch?v=7kTNuymbDGs&t=459s',
                        'https://www.youtube.com/watch?v=uyWzgsx0Xjw',
                        'https://www.youtube.com/watch?v=zt7yQxCJzfk',
                        'https://www.youtube.com/watch?v=W1ccye0VpyE',
                        'https://www.youtube.com/watch?v=fgjAdNeUsyg',
                        'https://www.youtube.com/watch?v=lJDqYPXTY3g&t=1450s',
                        'https://www.youtube.com/watch?v=WYeBrH4-xVs&t=1761s',
                        'https://www.youtube.com/watch?v=SMdouBjS7b8',
                        'https://www.youtube.com/watch?v=d7Ug-tJRnrg&t=1987s'
                    ];
                    
                    foreach ($videos as $video):
                        preg_match('/v=([^&]+)/', $video, $matches);
                        $videoId = $matches[1] ?? '';
                    ?>
                        <div class="video-card fade-in">
                            <div class="video-wrapper">
                                <iframe 
                                    src="https://www.youtube.com/embed/<?php echo htmlspecialchars($videoId); ?>" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Written Articles Section -->
            <div class="media-subsection">
                <h3>Напишани статии за авторот:</h3>
                <div class="articles-list">
                    <?php
                    $articles = [
                        ['url' => 'https://zenskimagazin.faktor.mk/utrinsko-kafe-so-jovan-ilieski-kafeto-nautro-sekogash-go-pijam-sam', 'title' => 'Утринско кафе со Јован Илиески'],
                        ['url' => 'https://cosinusmk.weebly.com/1053105410421054105710581048/8014099', 'title' => 'Интервју - Cosinus'],
                        ['url' => 'https://tocka.com.mk/vesti/293199/video', 'title' => 'Видео - Точка'],
                        ['url' => 'https://culturalchat.org/mk/со-новиот-роман-на-јован-илиески-патув/', 'title' => 'Со новиот роман на Јован Илиески'],
                        ['url' => 'https://misli.mk/kniga-na-denot-nokjta-koga-ja-napushtiv-praga-od-jovan-ilieski/', 'title' => 'Книга на денот - Ноќта кога ја напуштив прага'],
                        ['url' => 'https://hashtag.faktor.mk/kazi-mi-so-tanc-vo-sabota-i-nedela-kje-go-ispolni-kapitol-so-ritam-dvizenja-muzika-i-poezija', 'title' => 'Кажи ми со танц'],
                        ['url' => 'https://www.crnobelo.com/novosti/domasni/95540-jovan-ilieski-24-na-4-godini-pochnav-da-peltecham-poradi-trauma-bev-meta-za-zadevanje-sega-ne-se-sramam-od-toa', 'title' => 'Јован Илиески - Интервју'],
                        ['url' => 'https://citaj.be/tatko-mi-bosfor/', 'title' => 'Татко ми Босфор - Citaj.be'],
                        ['url' => 'https://www.crnobelo.com/intervju/razgovarame-so/89022-inspirativniot-jovan-ilieski-na-22-godini-napishal-5-knigi-modniot-stil-mu-e-prepoznatliv-znak', 'title' => 'Инспиративниот Јован Илиески'],
                        ['url' => 'https://hashtag.faktor.mk/ona-za-koe-ne-se-zboruva-jas-sakam-da-go-napisham-vo-moite-knigi-intervju-so-mladiot-pisatel-jovan-ilieski', 'title' => 'Интервју со младиот писател'],
                        ['url' => 'https://www.crnobelo.com/zivot/patuvanje/90670-jovan-ilieski-za-nova-godina-go-posetiv-istanbul-zoshto-na-ovoj-grad-mu-se-vrakjam-odnovo-i-odnovo', 'title' => 'За нова година го посетив Истанбул'],
                        ['url' => 'https://culturalchat.org/mk/патуваме-со-јован-илиески-во-копенхаг/', 'title' => 'Патуваме со Јован Илиески во Копенхаген'],
                        ['url' => 'https://culturalchat.org/mk/писателот-јован-илиески-за-неговата-п/', 'title' => 'Писателот Јован Илиески за неговата пoезија'],
                        ['url' => 'https://misli.mk/kniga-na-denot-soba-610-od-jovan-ilieski/', 'title' => 'Книга на денот - Соба 610'],
                        ['url' => 'https://shtip.today/интервју-со-ј-о-ван-ил-иески-face-of-the-week/', 'title' => 'Face of the Week - Јован Илиески'],
                        ['url' => 'https://arhiva.emagazin.mk/petti-roman-na-ovan-ilieski-soba-610-kolku-e-go-chini-zlostornikot-ako-bide-zhrtva-na-sopstveniot-haos/', 'title' => 'Петти роман на Јован Илиески - Соба 610']
                    ];
                    
                    foreach ($articles as $article):
                    ?>
                        <a href="<?php echo htmlspecialchars($article['url']); ?>" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="article-link fade-in">
                            <span class="article-icon">📰</span>
                            <span class="article-title"><?php echo htmlspecialchars($article['title']); ?></span>
                            <span class="article-arrow">→</span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
