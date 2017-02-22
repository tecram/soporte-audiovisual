<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<!-- <link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed"> -->

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php 
			$terms = get_terms('disponibilidad');
			
			$categories_args = array(
			    'taxonomy'               => 'categoria',
			    'parent'				 => 0,
			    'orderby'                => 'name',
			    'order'                  => 'ASC',
			    'hide_empty'             => false,
			);
			$categories = new WP_Term_Query($categories_args);

			$currentterm = get_term_by( 'slug', get_query_var( 'categoria' ), get_query_var( 'taxonomy' ) );
		
		?>
		<ul>
			<?php foreach ($terms as $term => $value) { ?>
					<li class="<?php echo $value->slug; ?>"><a href="/disponibilidad/<?php echo $value->slug; ?>"><?php echo $value->name; ?></a></li>
			<?php } ?>
		</ul>
		<hr>
		<ul>
			<?php foreach ($categories->get_terms() as $category) { ?>
					<li class="<?php echo $category->slug; if ($currentterm->slug == $category->slug) { echo ' active';} ?>"><a href="/categoria/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></li>
			<?php } ?>
		</ul>
		<hr>

