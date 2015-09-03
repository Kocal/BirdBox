<?php
$title = 'Project';
require_once 'inc/header.php';
?>
    <main role="main">
        <h2 class="page-title">Our project: BirdBox</h2>

	<p>According to the subject of our project of this special week, BirdBox must be hable to take photos with a sensor which will trigger a shooting when a bird inside the box.</p>

	<p>To improve the project, we had some features, like streaming and a website which able us to watch photos taken by BirdBox, and watch the streaming.</p>


	<p>The BirdBox's features</p>
	<ul>
		<li>Shooting when a bird is detected</li>
		<li>Viewing shoots on the website</li>
		<li>Watch the streaming on the website</li>
	</ul>

        <hr>

        <h3>Raspberry Pi</h3>
	<p>It is the <b>Raspberry Pi</b> which, due to the program, will be responsible to interact correctly with our differents modules.</p>

        <h3>Motion sensor</h3>
	<p>The <b>Motion sensor</b> should be able to detect a bird when this one comes into the BirdBox.</p>
    
	<p>We want only takes photos when the bird comes into the BirdBox. <br>
So we thought about a system which will be able to detect the bird's way, and then take a photo when the bird come in, and don't do anything when this bird left the BirdBox.<br/>
One interesting thing would have to use two motion sensors. According to the order of detection of these, we could determine the bird's way.
</p>

	<p>But, we haven't two motion sensors. So our final solution was to took a photo <b>one time in two</b>.</p>

        <h3>Camera</h3>
	<p>The <b>camera</b>'s role would be to takes photos when the motion sensor detects something, but she will be able to streaming too.</p>
	<p>During our development phase, we noticed that will be impossible to take photos during a stream.<br>
But we found a solution an effective and dirty solution.<br>
When the motion sensor detects a bird and say to the camera to take a photo, the streaming is cut, we take the photo, and we launch the stream after.</p>
	<p>Moreover, when a photo is taken, we took the opportunity to generate a thumbnail in order to decrease the photos's webpage loading.</p>

        <h3>Website</h3>
	<p>This <b>website</b>'s role to display a media player in order to watch the stream.<br/>
Of course, it will allow the user to see photos taken by the BirdBox, and sort them by date.</p>
        
        <hr>

        <h3>Mindmap</h3>
	<p>Below this, there is a mindmap which recap the functioning of our project.</p>
        <figure class="text-center">
            <img src="/assets/img/Carte mentale - English - Edited.png" alt="Mindmap of the Birdbox">
            <figcaption>Mindmap of the BirdBox</figcaption>
        </figure>

        <hr>

        <h3>Diagram of the electronic circuit</h3>
	<p>We made a diagram of the electronic circuit with the software <b>Fritzing</b> for a better representation of the electronic circuit, but also to make our job easier during our daily assemblies and disassemblies.</p>
        <figure class="text-center">
            <img src="/assets/img/schema.png" alt="Mindmap of the Birdbox">
            <figcaption>Diagram of the circuit</figcaption>
        </figure>

        <h4>Role of the components:</h4>
	<ul>
            <li><b>Red DEL (on the left)</b> : shows power up of the Raspberry Pi</li>
            <li><b>Yellow DEL</b> : shows if the <b>motion sensor</b> has send a signal</li>
            <li><b>Red DEL (in the middle)</b> : shows if the bird <b>goes out</b> of the BirdBox.</li>
            <li><b>Green DEL</b> : shows if the bird <b>goes in</b> the BirdBox.</li>
            <li><b>Motion sensor</b> : send a signal to the Raspberry Pi when it detects something.</li>
        </ul>

        <h4>BirdBox's photo</h4>
	<p>We realized the circuit modelised with Fritzing, and we get this.</p>
        <figure class="text-center">
            <img src="/assets/img/le-projet.jpg" alt="Photo of theBirdbox">
            <figcaption>BirdBox</figcaption>
        </figure>
    
        <hr>

        <h3>Technologies used</h3>
        <h4>Application</h4>
        <p>The main program of the project was written with the language <b>Bash</b>.</p>

        <h4>Camera</h4>
        <p>The shooting is possible with the program <b>raspistill</b>, and the streaming with <b>raspivid</b>, <b>ffmpeg</b>, and <b>crtmpserver</b>.</p>

        <h4>Motion sensor</h4>
	<p>The functioning of the motion sensor is internal, we just need to capture the signal on the <i>OUT</i> pin to know if something was detected or not.</p>

    	<h4>Website</h4>
	<p>La Raspberry Pi use the webserver <b>Apache</b> to host our website. We also used <b>HTML</b> and <b>CSS</b> to structure the content and the layout. And we also used <b>PHP</b> for the dynamic part, like get photos taken and display those per date.</p>

        <hr>

        <h3>Project code</h3>
        <h4>Programme.sh</h4>
	<p>It is the main program. It manages the inputs/outputs, as well as the coordination between the differents components.<br/><a href="viewfile.php?file=program">View this file by clicking here</a>.</p>
        <!--<code data-gist-id="3b3bd1656ec3d1c25f98" data-gist-file="programme.sh"></code>-->

        <h4>Stream.sh</h4>
        <p>A subprogram which permit to start a stream on the 6666 port.<br/><a href="viewfile.php?file=stream">View this file by clicking here</a>.</p>
        <!--<code data-gist-id="3b3bd1656ec3d1c25f98" data-gist-file="stream.sh"></code>-->
    </main>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gist-embed/2.1/gist-embed.min.js"></script>
<?php
require_once 'inc/footer.php';
