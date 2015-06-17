<?php
$title = 'Photos';
require_once 'inc/header.php';

/**
 * Dossier des images
 */
$dir = 'pics';

/**
 * On récupère les photos dans le dossier
 */
$files = glob($dir  . '/*.jpg');

/**
 * Tableau de photos triées
 */
$pics = [];

/**
 * Traitement
 */
foreach ($files as $file) {
    list($date, $heure) = explode('_', str_replace($dir . '/', '', explode('.', $file)[0]));
    $thumbnail = $dir . '/' . $date . '_' . $heure . '_thumbnail.jpg';

    list($width, $height) = getimagesize($file);


    $width = 300;
    $height = 200;
    $thumbnail = 'http://lorempicsum.com/simpsons/300/200/2';


    $pics[$date][] = [
        'file' => $file,
        'thumbnail' => [
            'file' => $thumbnail,
            'width' => $width,
            'height' => $height
        ],
        'date' => $date,
        'heure' => $heure
    ];
}
//var_dump($pics);
?>

    <main role="main">
        <h2 class="page-title">Photos taken by the Raspberry Pi</h2>
        <hr/>
        <p>
            <form action="" method="get">
                <label for="inputDate">View photos taken on : </label>
                <select name="date" id="inputDate">
                    <option value="all">All days</option>
                    <?php foreach($pics as $date => $pic): ?>
                        <option value="<?= $date ?>" <?= (!empty($_GET['date']) && $_GET['date'] === $date ? 'selected' : '') ?>><?= parse_date($date) ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="View"/>
            </form>
        </p>
        <hr/>

        <section>
            <?php if(empty($_GET['date']) || !empty($_GET['date']) && $_GET['date'] === 'all'): ?>
                <?php foreach($pics as $date => $lesPhotos): ?>
                    <?php
                        $lesPhotos = array_reverse($lesPhotos);
                        $date = parse_date($date);
                    ?>

                    <h3 class="thin">Photos taken on <b><?= $date ?></b></h3>
                    <div>
                    <?php foreach($lesPhotos as $photo): ?>
                        <?php
                            $heure = parse_heure($photo['heure']);
                        ?>

                        <figure>
                        <a href="<?= $photo['file'] ?>">
                            <img
                                src="<?= $photo['thumbnail']['file'] ?>"
                                width="<?= $photo['thumbnail']['width'] ?>px"
                                height="<?= $photo['thumbnail']['height'] ?>px"
                                title="Photo taken on <?= $date . ' at ' . $heure ?>"
                                alt="Photo taken on <?= $date . ' à ' . $heure ?>" /></a>
                            <figcaption>Photo taken at <?= $heure ?></figcaption>
                        </figure>
                    <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if(!empty($_GET['date']) && isset($pics[$_GET['date']])): ?>
                <?php
                    $date = parse_date($_GET['date']);
                ?>
                <h3 class="thin">Photos taken on <b><?= $date ?></b></h3>
                <?php foreach($pics[$_GET['date']] as $photo): ?>
                    <?php
                        $heure = parse_heure($photo['heure']);
                    ?>

                    <figure>
                        <a href="<?= $photo['file'] ?>">
                            <img
                                src="<?= $photo['thumbnail']['file'] ?>"
                                width="<?= $photo['thumbnail']['width'] ?>px"
                                height="<?= $photo['thumbnail']['height'] ?>px"
                                title="Photo taken on <?= $date . ' at ' . $heure ?>"
                                alt="Photo taken on <?= $date . ' à ' . $heure ?>" /></a>
                        <figcaption>Photo taken at <?= $heure ?></figcaption>
                    </figure>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if(!empty($_GET['date']) && !isset($pics[$_GET['date']]) && $_GET['date'] != 'all'): ?>
                <p>Aucune photos n'a été prise ce jour-ci.</p>
            <?php endif; ?>
        </section>
    </main>

    <script>
        var select = document.querySelector('#inputDate');

        select.addEventListener('change', function(e) {

            console.log(location.protocol + '//' + location.hostname + '/'  + 'photos.php?date=' + select.value);

            location.href = location.protocol + '//' + location.hostname + '/'  + 'photos.php?date=' + select.value;

        }, false);
    </script>

<?php
require_once 'inc/footer.php';
