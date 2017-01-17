<?php 

	/*
	*	View for Maps page
	*/

?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo lang('titleMaps'); ?></title>
    <link rel="stylesheet" type="text/css" href="CSS/mapstyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/combinestyle.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="JS/mapscript.js"></script>
    <script type="text/javascript" src="JS/combinescript.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body onload="enterMap();">
    <?php echo $nav; ?>

    <div class="slideshow-container">
        <h2><?php echo lang('motto'); ?></h2>
        <div class="mySlides fade">
            <img src="docs/Images/bled300px.png" alt="img1">
        </div>

        <div class="mySlides fade">
            <img src="docs/Images/img3.jpg" alt="img2">
        </div>

        <div class="mySlides fade">
            <img src="docs/Images/img2.jpg" alt="img3">
        </div>
        <div style="display: none">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

    </div>
    <script>showSlides();</script>



    <h1 id="choose"><?php echo lang('callAction'); ?></h1>

    <div class="myMap">
        <div id="map"></div>
        <input id="pac-input" class="controls" type="text" placeholder="<?php echo lang('startDest'); ?>" style="display: <?php echo $hide; ?>;">
        <input id="pac-input2" class="controls" type="text" placeholder="<?php echo lang('endDest'); ?>"style="display: <?php echo $hide; ?>;">
        <div id="side-panel">
            <div>
				<p style="display: <?php echo $hide ?>"><?php echo $msg ?></p><br>
				<?php echo $selectBox; ?>
            </div>
            <div id="routeinfo"></div>
            <div id="directions-panel"></div>
        </div>

    </div>
    
	<?php echo $footer; ?>
	
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRkZnaT_pPL_61JqcWFdbyYFNT_5N-CIA&callback=initMap&libraries=places&avoid=highways"></script>
</body>
</html>