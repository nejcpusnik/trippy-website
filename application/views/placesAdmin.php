<?php 

	/*
	*	Administrator sub-view for Places page
	*/

?>		<form method="POST" action="">
        <div class="pokrajina">
            <label class="ime-pokrajine" for="toggle-1">GORENJSKA</label>
            <input type="checkbox" id="toggle-1">
            <label class="fa fa-chevron-right" for="toggle-1"></label>
            <div class="abouttext">
                <ul class="regionList">
					<?php echo $r1; ?>
                </ul>
				<hr>
				<textarea name="desc1" class="placeDescription"><?php echo $Gorenjska;?></textarea>
            </div>
        </div>
        <br>
        <div class="pokrajina">
            <label class="ime-pokrajine" for="toggle-2">ŠTAJERSKA</label>
            <input type="checkbox" id="toggle-2">
            <label class="fa fa-chevron-right" for="toggle-2"></label>
            <div class="abouttext">
                <ul class="regionList">
					<?php echo $r2; ?>
                </ul>
				<hr>
				<textarea name="desc2" class="placeDescription"><?php echo $Štajerska;?></textarea>
            </div>
        </div>
        <br>
        <div class="pokrajina">
            <label class="ime-pokrajine" for="toggle-3">PRIMORSKA</label>
            <input type="checkbox" id="toggle-3">
            <label class="fa fa-chevron-right" for="toggle-3"></label>
            <div class="abouttext">
                <ul class="regionList">
					<?php echo $r3; ?>
                </ul>
				<hr>
				<textarea name="desc3" class="placeDescription"><?php echo $Primorska;?></textarea>
            </div>
        </div>
        <br>
        <div class="pokrajina">
            <label class="ime-pokrajine" for="toggle-4">DOLENJSKA</label>
            <input type="checkbox" id="toggle-4">
            <label class="fa fa-chevron-right" for="toggle-4"></label>
            <div class="abouttext">
                <ul class="regionList">
					<?php echo $r4; ?>
                </ul>
				<hr>
				<textarea name="desc4" class="placeDescription"><?php echo $Dolenjska;?></textarea>
            </div>
        </div>
        <br>
        <div class="pokrajina">
            <label class="ime-pokrajine" for="toggle-5">KOROŠKA</label>
            <input type="checkbox" id="toggle-5">
            <label class="fa fa-chevron-right" for="toggle-5"></label>
            <div class="abouttext">
                <ul class="regionList">
					<?php echo $r5; ?>
                </ul>
				<hr>
				<textarea name="desc5" class="placeDescription"><?php echo $Koroška;?></textarea>
            </div>
        </div>
        <br>
        <div class="pokrajina">
            <label class="ime-pokrajine" for="toggle-6">NOTRANJSKA</label>
            <input type="checkbox" id="toggle-6">
            <label class="fa fa-chevron-right" for="toggle-6"></label>
            <div class="abouttext">
                <ul class="regionList">
					<?php echo $r6; ?>
                </ul>
				<hr>
				<textarea name="desc6" class="placeDescription"><?php echo $Notranjska;?></textarea>
            </div>
        </div>
		<br>
			<input type="submit" class="button" name="regionSubmit" value="<?php echo lang("saveButton"); ?>" style="width: 100px;">
		</form>