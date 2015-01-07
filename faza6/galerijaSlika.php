<ul class="example-orbit show-for-medium-up" data-orbit>
	<?php
	$slike = scandir($_SERVER["DOCUMENT_ROOT"] . $putanjaApp . "img/dojave/");
	
	foreach ($slike as $s):
		if(substr($s, 0,1)=="."){
			continue;
		} 
		?>
		<li>
		<img style="width: 750px; height: 500px;" src="img/dojave/<?php echo $s ?>">
		<div class="orbit-caption">
			Dio opisa iz baze. <a href="#">Više</a>
		</div>
	</li>
		<?php
	endforeach;
	 ?>
</ul>

