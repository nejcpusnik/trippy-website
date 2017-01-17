<?php 

	/*
	*	Guest select box sub-view for Maps page
	*/

?><select disabled size="5" multiple id="waypoints">
	<?php echo $stops; ?>
</select>
<br>
<input type="submit" id="submit" value="<?php echo lang('showButton'); ?>">