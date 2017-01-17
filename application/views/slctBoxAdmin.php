<?php 

	/*
	*	Administrator select box sub-view for Maps page
	*/

?><p><?php echo lang('adminInstruction'); ?></p><br>
<form method="POST" action="maps">
	<select  id="waypoints" name ="oldplace">
		<?php echo $stops; ?>
	</select>
	<br><br>
	<input type="submit"  class="button" value="<?php echo lang('deleteButton'); ?>">
</form>
<br><br>
<form method="POST" action="maps">
	<input type="text" class="inputText" name="newplace" placeholder="<?php echo lang('newPlace'); ?>">
	<select name="newregion" style="width: 220px;">
		<option>Gorenjska</option>
		<option>Štajerska</option>
		<option>Primorska</option>
		<option>Dolenjska</option>
		<option>Koroška</option>
		<option>Notranjska</option>
	</select>
	<br><br>
	<input type="submit" class="button"  value="<?php echo lang('addButton'); ?>"><br><br>
</form>