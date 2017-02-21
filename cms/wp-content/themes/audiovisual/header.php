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
			    'orderby'                => 'name',
			    'order'                  => 'ASC',
			    'hide_empty'             => false,
			);
			$categories = new WP_Term_Query($categories_args);

		?>
		<!-- <pre><?php var_dump($categories); ?></pre> -->
		<?php foreach ($terms as $term => $value) { ?>
			<ul>
				<li class="<?php echo $value->slug; ?>"><?php echo $value->name; ?></li>
			</ul>
		<?php } ?>
		<hr>
		<?php foreach ($categories->get_terms() as $category) { ?>
			<ul>
				<li class="<?php echo $category->slug; ?>"><?php echo $category->name; ?></li>
			</ul>
		<?php } ?>
		<hr>
