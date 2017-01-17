<?php 

	/*
	*	View for Navigation bar
	*/

?><ul class="topnav" id="myTopnav">
    <li><a href="http://ezoarhiv.si/site"><?php echo lang("home"); ?></a></li>
	<li><span class="langLink<?php echo $lang_english; ?>" onclick="document.getElementById('langInput').value='english'; document.getElementById('langForm').submit();">eng</span> | <span class="langLink<?php echo $lang_slovenian; ?>" onclick="document.getElementById('langInput').value='slovenian'; document.getElementById('langForm').submit();">slo</span></li>
    <?php echo $loginHTML; ?>
    <li><a href="maps"><?php echo lang("planTrip"); ?></a></li>
    <li><a href="places"><?php echo lang("explore"); ?></a></li>
	<?php echo $user; ?>
    <li class="icon">
        <a href="javascript:void(0);" onclick="responsiveNav()">&#9776;</a>
    </li>
	<form method="POST" id="langForm">
		<input type="hidden" id="langInput" name="lang">
	</form>
</ul>