<?php 

	/*
	*	View for Login page
	*/

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo lang('titleLogin'); ?></title>
    <link rel="stylesheet" type="text/css" href="CSS/loginstyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/combinestyle.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">

    <script type="text/javascript" src="JS/combinescript.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php echo $nav; ?>

    <div class="slideshow-container">
        <div class="text-wrapper">
            <h2><?php echo lang('motto'); ?></h2>
        </div>
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

    <div class="mainContainer">
        <div class="loginContainer">
            <h1><?php echo lang('loginLabel'); ?></h1>
            <form id="loginForm" method="POST" action="login">
                <label for="usr"><?php echo lang('emailUsername'); ?></label><br>
                <input type="text" id ="usr" name = "username" required><br>
                <label for="pw"><?php echo lang('password'); ?></label><br>
                <input type="password" id ="pw" name = "password" required><br>
                <span id="loginWarning" class="loginWarning" style="display: <?php echo $errorState; ?>;"><?php echo lang('incorrect'); ?></span><br>
                <input value="<?php echo lang('loginButton'); ?>" class="button" type="submit"> <!--onclick="return loginCheck();"-->
            </form>
            <br><br>
            <div class="forgoten">
                <a href="login/forgotpw" id="forgot"><?php echo lang('forgotPassword'); ?></a>
            </div>
        </div>
        <div class="signup-container">
            <h1><?php echo lang('createNew'); ?></h1>

            <form id="newForm" method="POST" action="login">
                <input type="text" id ="usr1" name = "reg_username" placeholder="<?php echo lang('newUsername'); ?>" required><br>
                <input type="email" id ="mail" name = "mail" placeholder="<?php echo lang('newEmail'); ?>" required><br>
                <input type="password" id ="pw1" name = "password1" placeholder="<?php echo lang('newPassword'); ?>" required>
                <input type="password" id ="pw2" name = "password2" placeholder="<?php echo lang('reEnterPassword'); ?>" required><br>
                <span id="formWarning" class="formWarning" style="display: <?php echo $errorStateReg;?>;"><?php echo $errorMsg; ?></span><br>
                <input value="<?php echo lang('createButton'); ?>" class="button" type="submit"> <!--onclick="return formCheck();"-->
            </form>

        </div>
    </div>
	<?php echo $footer; ?>
</body>

</html>