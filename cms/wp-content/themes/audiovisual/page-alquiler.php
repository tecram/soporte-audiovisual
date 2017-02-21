<?php
	/* Template Name: Alquiler */
	get_header();

	$args=array(
		'post_type'			=> 'products',
		'order'				=> 'desc',
		'posts_per_page'	=> -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'disponibilidad',
				'field'    => 'slug',
				'terms'    => 'alquiler',
			)
		),
	);
	$products = new WP_Query($args);
?>

<?php
	if ($products->have_posts()) : 
		while ($products->have_posts()) : $products->the_post();
			$brand = get_field('marca');
			$model = get_field('modelo');
			$description = get_field('descripcion');
			$hot = get_field('destacado');
			$new = get_field('nuevo');
			$related = get_field('productos_relacionados');
?>
			<p>Title: <?php the_title(); ?></p>
			<p>Marca: <?php echo $brand; ?></p>
			<p>Modelo: <?php echo $model; ?></p>
			<p>Descripcion: <?php echo $description; ?></p>
			<p>Destacado: <?php echo $hot; ?></p>
			<p>Nuevo: <?php echo $new; ?></p>
			<p>Relacionados: <?php print_r($related); ?></p>
			
			<hr>
		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>