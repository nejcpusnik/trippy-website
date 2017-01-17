<?php 

	/*
	*	View for Forgot Password page
	*/

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo lang('titleForgot'); ?></title>
    <link rel="stylesheet" type="text/css" href="../CSS/combinestyle.css">
    <script type="text/javascript" src="../JS/forgotPw.js"></script>
</head>
<body>
<input type="hidden" id="lang" value="<?php echo $lang; ?>">
<h1><?php echo lang('forgotMsg'); ?></h1>
<h3><?php echo lang('instruction'); ?></h3>

<form id="loginForm" method="GET" action="../login">
    <label for="forgotmail"><?php echo lang('inputLabel'); ?></label><br>
    <input type="text" id ="forgotmail" name = "username"><br>
    <span id="emailWarning" class="emailWarning"></span><br>
    <input value="<?php echo lang('sendButton'); ?>" class="button" id = "button1" type="submit" onclick="return emailCheck()">
</form>
</body>
</html>