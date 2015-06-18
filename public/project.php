<?php
$title = 'Projet';
require_once 'inc/header.php';
?>
    <main role="main">
        <h2 class="page-title">Our project: BirdBox</h2>

        <p>Selon le sujet de notre projet de Semaine Spéciale, la Birdbox devra être capable de prendre une photo grâce
        à un capteur qui déclenchera une prise de vue lorsqu'un oiseau viendra se nourrir ou rentrera dans son nid.</p>
        <p>Afin d'améliorer le projet, nous avons rajouter d'autres fonctionnalités, comme la diffusion en direct de ce que la caméra "voit", et un site web qui permettra de visualiser les photos prises par la Birdbox, et la diffusion en direct.</p>

        <p>Les fonctionnalités de la BirdBox sont donc les suivantes :</p>
        <ul>
            <li>Prise de vue lorsqu'un oiseau est détecté</li>
            <li>Diffusion en direct sur un site web</li>
            <li>Visualisation des prises de vues sur le site web</li>
            <li>Visualisation de la diffusion en direct sur le site web</li>
        </ul>

        <hr>

        <p>Afin de réaliser correctement projet, nous l'avons séparé en plusieurs modules de la manière suivante :</p>
        <ul>
            <li><b>Raspberry Pi (BirdBox)</b></li>
            <li><b>Détecteur de mouvement</b></li>
            <li><b>Caméra</b></li>
            <li><b>Site web</b></li>
        </ul>

        <hr>

        <h3>Raspberry Pi</h3>
        <p>C'est la <b>Raspberry Pi</b>, qui grâce à notre programme, sera chargée de faire intéragir correctement nos différents modules.</p>

        <h3>Détecteur de mouvement</h3>
        <p>Le <b>Détecteur de mouvement</b> aura pour rôle de détecter un oiseau venant se nourrir ou rentrer dans son nid.</p>

        <p>Nous voulions que la BirdBox ne prenne des prises de vue <b>que</b> quand un oiseau rentre dans son nid, ou vient se nourrir.<br>
        Nous avons donc pensé à un système permettant de trouver le sens de l'oiseau, et donc de prendre une prise de vue lorsqu'un oiseau rentre, et ne rien fait lorsqu'un oiseau sort. <br>
        Une idée intéressante aurait été d'utiliser deux détecteurs de mouvements. Selon l'ordre de détection de ces derniers, on aurait donc pu déterminer le sens de l'oiseau.</p>

        <p>Seul problème, nous ne possédons qu'un détecteur de mouvement. Notre solution finale était donc de prendre une prise de vue <b>une fois sur deux</b>.</p>

        <h3>Caméra</h3>
        <p>La <b>Caméra</b> aura pour rôle de prendre des photos lorsque que le <b>détecteur de mouvement</b> détecte quelque chose, mais elle devra aussi être capable de diffuser du contenu en direct.</p>
        <p>Pendant notre phase de développement, nous avons constaté qu'il était impossible de prendre des photos pendant une diffusion en direct. <br/>
        Cependant, nous avons réussi à résoudre ce problème de <b>manière sale</b>, mais <b>efficace</b>. <br/>
        Dès que le <b>détecteur de mouvement</b> détecte un oiseau et dit à la <b>caméra</b> de prendre une photo, la diffusion en directe est coupée, on prend la photo, et on relance ensuite la diffusion.</p>

        <p>De plus, lorsqu'une photo est prise, on en profite pour génerer une miniature afin de diminuer le chargement de la page des photos.</p>

        <h3>Site web</h3>
        <p>Le <b>site web</b> où vous vous trouvez actuellement aura pour rôle d'afficher un lecteur multi-média permettant ainsi une visualisation de la diffusion en direct.<br/>
        Il devra aussi permettre à l'utilisateur de voir les photos prises par la <b>BirdBox</b>.<br/>
        De plus, l'utilisateur pourra voir soit toutes les photos en meme temps, soit les voir par date.</p>

        <hr>

        <h3>Mindmap</h3>
        <p>Ci-dessous une carte mentale résumant le fonctionnement de notre projet.</p>
        <figure class="text-center">
            <img src="/assets/img/Carte mentale - English - Edited.png" alt="Mindmap of the Birdbox">
            <figcaption>Mindmap of the BirdBox</figcaption>
        </figure>

        <hr>

        <h3>Schéma du circuit</h3>
        <p>Nous avons réalisé un schéma du circuit électronique avec le logiciel <b>Fritzing</b> pour une meilleure présentation du circuit, mais aussi pour nous faciliter la tâche lors des montages/démontages quotidient du circuit.</p>
        <figure class="text-center">
            <img src="/assets/img/schema.png" alt="Mindmap of the Birdbox">
            <figcaption>Schéma du circuit</figcaption>
        </figure>

        <h4>Rôle des composants :</h4>
        <ul>
            <li><b>LED rouge (à gauche)</b> : Indique la mise sous tension de la Raspberry Pi</li>
            <li><b>LED jaune</b> : Indique si le <b>détecteur de mouvement</b> a envoyé un signal</li>
            <li><b>LED rouge (au milieu)</b> : Indique si l'oiseau <b>sort</b> de la cage</li>
            <li><b>LED verte</b> : Indique si l'oiseau <b>entre</b> de la cage</li>
            <li><b>Détecteur de mouvement</b> : envoie un signal à la Raspberry Pi s'il détecte un oiseau</li>
        </ul>

        <h4>Photo de la BirdBox</h4>
        <p>Nous avons réalisé le circuit modélisé avec Fritzing, et nous obtenons donc ceci.</p>
        <figure class="text-center">
            <img src="/assets/img/le-projet.jpg" alt="Photo of theBirdbox">
            <figcaption>Photo du projet</figcaption>
        </figure>
    
        <hr>

        <h3>Technologies utilisées</h3>
        <h4>Application</h4>
        <p>Le programme principal du projet a été écrit en <b>Bash</b></p>

        <h4>Caméra</h4>
        <p>La prise de photos se fait grâce au programme <b>raspistill</b>, et la diffusion de contenu en direct se fait grâce aux programme <b>raspivid</b>, <b>ffmpeg</b>, et <b>crtmpserver</b>.</p>

        <h4>Détecteur de mouvement</h4>
        <p>Le fonctionnement du détecteur de mouvement étant interne, nous avons juste à récupérer le signal sur le pin <i>OUT</i> pour savoir si un oiseau a été détecté ou non.</p>

        <h4>Site web</h4>
        <p>La Raspberry Pi utilise le server web <b>Apache</b> pour héberger notre site web. Nous avons aussi utilisé les technologies <b>HTML</b> et <b>CSS</b> pour structurer le contenu et la mise en page, et enfin, nous avons aussi utilisé <b>PHP</b> pour la partie dynamique, comme récupérer les photos prises par la BirdBox et les afficher par date.</p>
        <hr>

        <h3>Code du projet</h3>
        <h4>Programme.sh</h4>
        <p>C'est le programme principal. C'est lui qui gère les entrées et sorties, ainsi que la coordination entre les différents composants.</p>
        <code data-gist-id="3b3bd1656ec3d1c25f98" data-gist-file="programme.sh"></code>

        <h4>Stream.sh</h4>
        <p>Un sous-programme qui permet de démarrer une diffusion en direct sur le port <b>6666</b>.</p>
        <code data-gist-id="3b3bd1656ec3d1c25f98" data-gist-file="stream.sh"></code>
    </main>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gist-embed/2.1/gist-embed.min.js"></script>
<?php
require_once 'inc/footer.php';
