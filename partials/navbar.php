<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="../../"><i class="fas fa-home"></i></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				</ul>
				<div class="my-2 my-lg-0">

						<?php

							if ($title != '| Login') {
								if (isset($_SESSION)) {
									echo '
									<div class="dropdown">
										<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
											'.$user['nama'].'
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="pages/profil">profil</a>
											<a class="dropdown-item" href="../logout">logout</a>
										</div>
									</div>
									';
								}	
							}

						?>
						
				</div>
			</div>
		</div>
	</nav>