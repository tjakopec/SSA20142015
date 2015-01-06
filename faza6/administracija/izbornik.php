<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="name">
					<h1><a href="<?php echo $putanjaApp; ?>administracija/nadzornaPloca.php">ADMIN</a></h1>
				</li>
				<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
				<li class="toggle-topbar menu-icon">
					<a href="#"><span>IZBOR</span></a>
				</li>
			</ul>

			<section class="top-bar-section">
				<!-- Right Nav Section -->
				<ul class="right">

					<li class="has-dropdown">
						<a href="#">Ostalo</a>
						<ul class="dropdown">
							<li>
								<a href="#">Psi</a>
							</li>
							<li>
								<a href="#">Korisnici</a>
							</li>
							<li>
								<a href="#">Statusi pasa</a>
							</li>
							<li>
								<a href="#">Statusi korisnika</a>
							</li>
							<li>
								<a href="<?php echo $putanjaApp; ?>administracija/operateri/index.php">Operateri</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="button" href="<?php echo $putanjaApp; ?>administracija/odjava.php">Odjava</a>
					</li>
				</ul>

				<!-- Left Nav Section -->
				<ul class="left">
					<li>
						<a href="<?php echo $putanjaApp; ?>administracija/neobradeneDojave/index.php">Neobrađene dojave</a>
					</li>
					
				</ul>
			</section>
		</nav>