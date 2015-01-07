<div class="row">
	<?php
			$izraz = $veza -> prepare("select * from neobradene_dojave where odobreno=1 order by datum desc");
			$izraz -> execute();
			$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
			foreach ($rezultati as $red):
			?>
			<div class="large-4 columns">
				<div class="panel callout radius">
					<?php echo $red -> poruka; ?>
					<hr />
					<a href="#">Više</a>
				</div>
			</div>
			<?php
			endforeach;
			$veza = null;
			?>
</div>

