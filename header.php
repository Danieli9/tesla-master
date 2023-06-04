<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'tesla-master' ); ?></a>

		<div class="container">

			<header id="masthead" class="navbar navbar-expand-md">

					<button
						class="navbar-toggler"
						type="button"
						data-bs-toggle="collapse"
						data-bs-target="#navbarNavDropdown"
						aria-controls="navbarNavDropdown"
						aria-expanded="false"
						aria-label="<?php esc_attr_e( 'Toggle navigation', 'tesla-master' ); ?>"
					>
						<span class="navbar-toggler-icon"></span>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'tesla-master',
							'menu_id'        => 'primary-menu',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ms-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
						)
					);
					?>

			</header><!-- #masthead -->
			
		</div>

