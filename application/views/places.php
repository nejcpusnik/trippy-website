<?php 

	/*
	*	Main view for Places page
	*/

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo lang("titlePlaces"); ?></title>
    <link rel="stylesheet" type="text/css" href="CSS/placesstyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/combinestyle.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <script type="text/javascript" src="JS/landingscript.js"></script>
    <script type="text/javascript" src="JS/combinescript.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php echo $nav; ?>

    <div class="slideshow-container">
        <h2><?php echo lang("motto"); ?></h2>
        <div class="mySlides fade">
            <img src="docs/Images/bled300px.png" alt="image1">
        </div>

        <div class="mySlides fade">
            <img src="docs/Images/img3.jpg" alt="image2">
        </div>

        <div class="mySlides fade">
            <img src="docs/Images/img2.jpg" alt="image3">
        </div>
        <div style="display: none">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

    </div>
    <script>showSlides();</script>



    <div class="main-places-container">
        <h1><?php echo lang("callAction"); ?></h1>
        
		<?php echo $regions; ?>
		
    </div>
	<?php echo $footer; ?>
</body>

</html>