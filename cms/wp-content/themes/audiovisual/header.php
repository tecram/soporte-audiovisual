<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/vendors.css" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.min.css" />

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="container">
			<div class="header-container">
				<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3">
					<header role="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Soporte Audiovisual">
							<h1><strong>Soporte Audiovisual</strong></h1>
						</a>
					</header>
				</div>
				<div class="col-lg-10 col-md-9 col-sm-8">
					<nav role="navigation" class="main-nav hidden-xs hidden-sm">
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 nopadding">
							<div class="action-btn">
								<?php
									$menu = wp_nav_menu( array(
									    'menu'       => 'Menu Disponibilidad',
									    'menu_class' => 'nav',
									    'current-menu-item' => 'active'
									));
								?>
							</div>
						</div>
						<div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
							<?php
								$menu = wp_nav_menu( array(
								    'menu'       => 'Menu',
								    'menu_class' => 'nav',
								    'current-menu-item' => 'active'
								));
							?>
						</div>
						<div class="col-lg-3 col-md-2 col-sm-12 col-xs-12 position-initial">
							<div class="search-content">
								<div id="morphsearch" class="morphsearch">
									<form class="morphsearch-form" method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
										<input class="morphsearch-input" name="search" type="search" placeholder="Buscar..."/>
										<input class="morphsearch-submit" type="submit" id="searchsubmit" value="Buscar..." />
									</form>
									<div class="morphsearch-content">
										<div class="row">
										<div class="panel panel-info">
											<div class="panel-heading">
												<h3 class="panel-title">Productos mas Buscados</h3>
											</div>
											<div class="panel-body">
												<div class="col-md-4">
													<div class="thumbnail">
														<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=270%C3%97160&w=270&h=160" alt="...">
														<div class="caption">
															<h3>Thumbnail label</h3>
															<p>...</p>
															<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="thumbnail">
														<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=270%C3%97160&w=270&h=160" alt="...">
														<div class="caption">
															<h3>Thumbnail label</h3>
															<p>...</p>
															<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="thumbnail">
														<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=270%C3%97160&w=270&h=160" alt="...">
														<div class="caption">
															<h3>Thumbnail label</h3>
															<p>...</p>
															<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
														</div>
													</div>
												</div>
											</div>
										</div>
										</div>
									</div>
									<span class="morphsearch-close"></span>
								</div>
							</div>
						</div>
					</nav>
				</div>
				<div class="hidden-md hidden-lg col-sm-2 col-xs-2 pull-right">
						<a href="#" class="mobileToggle">
							<span class="line"></span>
						</a>
					</div>
				<div class="clearfix"></div>
				<hr class="shadow"></hr>
			</div>
		</div>
		<section class="loader">
			<svg version="1.1" id="Layer_1" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
			 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50"
			 height="50" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
				<switch>
					<g i:extraneous="self">
						<g>
							<polygon class="path" fill="none" stroke="#0088FF" stroke-miterlimit="10" points="0.5,9.01 22.5,0.536 44.5,9.01 44.5,34.237 22.5,42.712 
								0.5,34.237 			"/>
							<g>
								<polygon class="line-logo" fill="#007AFF" points="38,18.679 38,13.017 23,7.215 23,12.923 				"/>
								<polygon class="line-logo" fill="#000081" points="8,18.679 8,13.017 23,7.215 23,12.923 				"/>
								<polygon class="line-logo" fill="#007AFF" points="38,29.996 38,24.333 8,13.008 8,18.671 				"/>
								<polygon class="line-logo" fill="#007AFF" points="8,24.342 8,30.004 23,35.806 23,30.097 				"/>
								<polygon class="line-logo" fill="#000081" points="38,24.342 38,30.004 23,35.806 23,30.097 			"/>
							</g>
						</g>
					</g>
				</switch>
			</svg>
			<div class="load-text">
				&#183; Cargando &#183;
			</div>
		</section>