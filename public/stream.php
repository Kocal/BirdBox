<?php
$title = 'Streaming';
require_once 'inc/header.php';
?>

    <main role="main">
        <h2 class="page-title">Streaming</h2>

	<?= (file_get_contents('errors/stream') == 1 ? "<div class='alert'><p>Il y a un problème avec la caméra, impossible de diffuser en direct.</p></div>" : "") ?>

        <div id="video-jwplayer_wrapper" style="position: relative; display: block; width: 960px; height: 540px;">
            <object type="application/x-shockwave-flash" data="/jwplayer/jwplayer.flash.swf" width="100%" height="100%" bgcolor="#000000" id="video-jwplayer" name="video-jwplayer" tabindex="0">
                <param name="allowfullscreen" value="true">
                <param name="allowscriptaccess" value="always">
                <param name="seamlesstabbing" value="true">
                <param name="wmode" value="opaque">
            </object>
            <div id="video-jwplayer_aspect" style="display: none;"></div>
            <div id="video-jwplayer_jwpsrv" style="position: absolute; top: 0px; z-index: 10;"></div>
        </div>

    </main>
    <script src="/jwplayer/jwplayer.js"></script>

    <script type="text/javascript">
        jwplayer('video-jwplayer').setup({
            flashplayer:"/jwplayer/jwplayer.flash.swf"
            , file:"rtmp://" + window.location.hostname + "/flvplayback/flv:myStream.flv"
            , autoStart: true
            , rtmp:{
                bufferlength:0.1
            }
            , deliveryType: "streaming"
            , width: 960
            , height: 540
            , player: {
                modes: {
                    linear: {
                        controls:{
                            stream:{
                                manage:false
                                , enabled: false
                            }
                        }
                    }
                }
            }
            , shows: {
                streamTimer: {
                    enabled: true
                    , tickRate: 100
                }
            }
        });
    </script>

    <script>
	setInterval(function() {
		var counter = 0;

		while(jwplayer().getState() === 'IDLE') {
		    jwplayer().play();
		    counter++;
		}

		counter = 0;
	}, 1000);
    </script>    
<?php
require_once 'inc/footer.php';
