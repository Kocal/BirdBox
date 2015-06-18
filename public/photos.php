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
$directoryIterator = new DirectoryIterator($dir);
$files = [];

foreach ($directoryIterator as $file) {
    if($file->isFile() && preg_match('/^.*[^_thumbnail].jpg$/', $file->getFilename())) {
        $files[] = $dir . '/' . $file->getFilename();
    }
}

/**
 * Tableau de photos triées
 */
$pics = [];
foreach ($files as $file) {
    list($date, $heure) = explode('_', str_replace($dir . '/', '', explode('.', $file)[0]));

//    var_dump('--');
    //    var_dump($date);
    //    var_dump($heure);
    //    var_dump(parse_date($date));
    //    var_dump(parse_heure($heure));

    $thumbnail = $dir . '/' . $date . '_' . $heure . '_thumbnail.jpg';

    // list($width, $height) = getimagesize($file);
    list($width, $height) = getimagesize($thumbnail);

    // $width = 300;
    // $height = 200;
    // $thumbnail = 'http://lorempicsum.com/simpsons/300/200/2';

    $pics[$date][] = [
        'file' => $file,
        'thumbnail' => [
            'file' => $thumbnail,
            'width' => $width,
            'height' => $height
        ],

        'date' => parse_date($date),
        'heure' => parse_heure($heure),
        'timestamp' => strtotime(parse_date($date) . ' ' . parse_heure($heure))
    ];
}

/**
 * Tri des photos par ordre décroissant de date
 */
ksort($pics);

/**
 * Tri des photos par ordre décroissant de timestamp
 */
foreach($pics as $k => $blbl) {
    usort($pics[$k], 'sortByTimestamp');
}

?>
    <main role="main">
        <h2 class="page-title">Photos taken by BirdBox</h2>
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
                    <h3 class="text-thin">Photos taken on <b><?= parse_date($date) ?></b></h3>
                    <div>
                    <?php foreach($lesPhotos as $photo): ?>
                        <figure class="thumbnail">
                        <a href="<?= $photo['file'] ?>">
                            <img
                                src="<?= $photo['thumbnail']['file'] ?>"
                                width="<?= $photo['thumbnail']['width'] ?>px"
                                height="<?= $photo['thumbnail']['height'] ?>px"
                                title="Photo taken on <?= $photo['date'] . ' at ' . $photo['heure'] ?>"
                                alt="Photo taken at <?= $photo['heure'] ?>" /></a>
                            <figcaption>Photo taken at <?= $photo['heure'] ?></figcaption>
                        </figure>
                    <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if(!empty($_GET['date']) && isset($pics[$_GET['date']])): ?>
                <h3 class="text-thin">Photos taken on <b><?= parse_date($date) ?></b></h3>
                <?php foreach($pics[$_GET['date']] as $photo): ?>
                    <figure class="thumbnail">
                        <a href="<?= $photo['file'] ?>">
                            <img
                                src="<?= $photo['thumbnail']['file'] ?>"
                                width="<?= $photo['thumbnail']['width'] ?>px"
                                height="<?= $photo['thumbnail']['height'] ?>px"
                                title="Photo taken at <?= $photo['heure'] ?>"
                                alt="Photo taken at <?= $photo['heure'] ?>" /></a>
                        <figcaption>Photo taken at <?= $photo['heure'] ?></figcaption>
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
            location.href = location.protocol + '//' + location.hostname + '/'  + 'photos.php?date=' + select.value;
        }, false);
    </script>

<?php
require_once 'inc/footer.php';
