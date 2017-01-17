<?php 

	/*
	*	View for Profile page
	*/

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo lang("titleProfile"); ?></title>
    <link rel="stylesheet" type="text/css" href="CSS/profilestyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/combinestyle.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">

    <script type="text/javascript" src="JS/combinescript.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php echo $nav; ?>


<div class="mainContainer2">
    <div class="profileContainer">
        <form method="POST" action="profile">
			<img class="logoIcon" src="docs/profile-icon.png">
			
			<h2><?php echo $username;?></h2>
			<label><?php echo lang("email"); ?> <?php echo $email; ?></label><br><br>
            <label><?php echo lang("changeLabel"); ?></label>
            <input type="password" id ="pass1" name = "pass1" placeholder="<?php echo lang("oldPassword"); ?>" required><br>
            <input type="password" id ="pass2" name = "pass2" placeholder="<?php echo lang("newPassword"); ?>" required><br>
            <input type="password" id ="pass3" name = "pass3" placeholder="<?php echo lang("retypePassword"); ?>" required><br>
			<span id="loginWarning" class="loginWarning" style="display: <?php echo $errorState; ?>;"><?php echo $errorMsg; ?></span>
			<br>
			<input value="<?php echo lang("changeButton"); ?>" class="button" type="submit">
        </form>
    </div>
</div>

	<?php echo $footer; ?>
</body>

</html>