<?php
	get_header();

	$tax_terms = get_terms('category');
	$currentterm = get_term_by( 'slug', get_query_var( 'category' ), get_query_var( 'taxonomy' ) );
	
	$terms = array(
		'post_type' => 'products',
		'posts_per_page'	=> -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'categoria',
				'field'    => 'slug',
				'terms'    => $currentterm,
			),
		),
	);
	$products = new WP_Query ($terms);
?>
<pre><?php var_dump($products); ?></pre>
	<hr>
	<!-- <?php if ($products->have_posts()) : 
		while ($products->have_posts()) : $products->the_post();
			$brand = get_field('marca');
			$model = get_field('modelo');
			$description = get_field('descripcion');
			$detalle_de_producto = get_field('detalle_de_producto');
			$especificaciones = get_field('especificaciones');
			$descargas = get_field('descargas');
			$hot = get_field('destacado');
			$new = get_field('nuevo');
			$related = get_field('productos_relacionados');
			?>
			<p>Title: <?php the_title(); ?></p>
			<p>Marca: <?php echo $brand; ?></p>
			<p>Modelo: <?php echo $model; ?></p>
			<p>Descripcion Corta: <?php echo $description; ?></p>
			
			<hr>
		<?php endwhile; ?>
	<?php endif; ?> -->
	
<?php get_footer(); ?>