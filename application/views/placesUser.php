<?php 

	/*
	*	Logged-in user sub-view for Places page
	*/

?>		<div class="pokrajina">
            <label class="ime-pokrajine" for="toggle-1">GORENJSKA</label>
            <input type="checkbox" id="toggle-1">
            <label class="fa fa-chevron-right" for="toggle-1"></label>
            <div class="abouttext">
                <ul class="regionList">
					<?php if(isset($r1)){ echo $r1; } ?>
                </ul>
				<hr>
				<p><?php echo $Gorenjska;?></p>
            </div>
        </div>
        <br>
        <div class="pokrajina">
            <label class="ime-pokrajine" for="toggle-2">ŠTAJERSKA</label>
            <input type="checkbox" id="toggle-2">
            <label class="fa fa-chevron-right" for="toggle-2"></label>
            <div class="abouttext">
                <ul class="regionList">
					<?php if(isset($r2)){ echo $r2; } ?>
                </ul>
				<hr>
				<p><?php echo $Štajerska;?></p>
            </div>
        </div>
        <br>
        <div class="pokrajina">
            <label class="ime-pokrajine" for="toggle-3">PRIMORSKA</label>
            <input type="checkbox" id="toggle-3">
            <label class="fa fa-chevron-right" for="toggle-3"></label>
            <div class="abouttext">
                <ul class="regionList">
					<?php if(isset($r3)){ echo $r3; } ?>
                </ul>
				<hr>
				<p><?php echo $Primorska;?></p>
            </div>
        </div>
        <br>
        <div class="pokrajina">
            <label class="ime-pokrajine" for="toggle-4">DOLENJSKA</label>
            <input type="checkbox" id="toggle-4">
            <label class="fa fa-chevron-right" for="toggle-4"></label>
            <div class="abouttext">
                <ul class="regionList">
					<?php if(isset($r4)){ echo $r4; } ?>
                </ul>
				<hr>
				<p><?php echo $Dolenjska;?></p>
            </div>
        </div>
        <br>
        <div class="pokrajina">
            <label class="ime-pokrajine" for="toggle-5">KOROŠKA</label>
            <input type="checkbox" id="toggle-5">
            <label class="fa fa-chevron-right" for="toggle-5"></label>
            <div class="abouttext">
                <ul class="regionList">
					<?php if(isset($r5)){ echo $r5; } ?>
                </ul>
				<hr>
				<p><?php echo $Koroška;?></p>
            </div>
        </div>
        <br>
        <div class="pokrajina">
            <label class="ime-pokrajine" for="toggle-6">NOTRANJSKA</label>
            <input type="checkbox" id="toggle-6">
            <label class="fa fa-chevron-right" for="toggle-6"></label>
            <div class="abouttext">
                <ul class="regionList">
					<?php if(isset($r6)){ echo $r6; } ?>
                </ul>
				<hr>
				<p><?php echo $Notranjska;?></p>
            </div>
        </div>