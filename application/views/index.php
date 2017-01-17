<?php 

	/*
	*	View for Index page
	*/

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo lang('titleIndex'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/landingstyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/combinestyle.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <script type="text/javascript" src="JS/landingscript.js"></script>
    <script type="text/javascript" src="JS/combinescript.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRkZnaT_pPL_61JqcWFdbyYFNT_5N-CIA&callback=initMap&libraries=places&avoid=highways"></script>
</head>
<body>

	<?php echo $nav; ?>

    <div class="container">
        <div id="crossfade">
            <img class="dummyImg" src="docs/Images/transparent.png" alt="dummy">
            <img class="slideCross" id="img1" src="docs/Images/land1.jpg" alt="Image 1">
            <img class="slideCross" id="img2" src="docs/Images/land2.jpg" alt="Image 2">
            <img class="slideCross" id="img3" src="docs/Images/land3.jpg" alt="Image 3">
            <img class="slideCross" id="img4" src="docs/Images/land4.jpg" alt="Image 4">
            <img class="slideCross" id="img5" src="docs/Images/land5.jpg" alt="Image 5">
        </div>

        <div class ="main">
            <div class = "header-text">
                <img id="logo-text" src="docs/trippy-logo-text.png" alt="logo">
                <h2><?php echo lang('callAction'); ?></h2>
            </div>
            <form class="formtohide" method="GET" action="maps">
                <label for="start"><?php echo lang('destStartLabel'); ?></label><br>
                <input type="text" id ="start" class ="inputClass" name="startdest"><br><br>
                <label for="end"><?php echo lang('destEndLabel'); ?></label><br>
                <input type="text" id ="end" class ="inputClass" name="enddest"><br><br>
                <input class ="gumb" type="submit" value="<?php echo lang('destButton'); ?>">
            </form>
        </div>
    </div>

    <div class="mainHidden">
        <form method="GET" action="maps">
            <label for="start-hidden"><?php echo lang('destStartLabel'); ?></label><br>
            <input type="text" id ="start-hidden" name = "startdest"><br>
            <br>
            <label for="end-hidden"><?php echo lang('destEndLabel'); ?></label><br>
            <input type="text" id ="end-hidden" name = "enddest"><br>
            <br>
            <input class="gumb" type="submit" value="<?php echo lang('destButton'); ?>">
        </form>
    </div>

    <div class="about">
        <input type="checkbox" id="toggle-1">
        <label class="fa fa-chevron-down" for="toggle-1"></label>
        <div class="abouttext">
            <h2><?php echo lang('howWorks'); ?></h2>
            <p> <b>1.</b> <?php echo lang('list1'); ?><br>
                <b>2.</b> <?php echo lang('list2'); ?><br>
                <b>3.</b> <?php echo lang('list3'); ?><br>
                <b>4.</b> <?php echo lang('list4'); ?><br>
                <b>5.</b> <?php echo lang('list5'); ?>
            </p>
        </div>
    </div>

	<?php echo $footer; ?>

    <script>
        function init() {
            var input = document.getElementById('start');
            var autocomplete = new google.maps.places.Autocomplete(input);
            var input2 = document.getElementById('end');
            var autocomplete2 = new google.maps.places.Autocomplete(input2);
            var input3 = document.getElementById('start-hidden');
            var autocomplete = new google.maps.places.Autocomplete(input3);
            var input4 = document.getElementById('end-hidden');
            var autocomplete2 = new google.maps.places.Autocomplete(input4);
        }
        google.maps.event.addDomListener(window, 'load', init);
    </script>
</body>

</html>
