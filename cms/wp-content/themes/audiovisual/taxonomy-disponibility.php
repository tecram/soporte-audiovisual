<?php
	get_header();
	$currentdisp = get_term_by( 'slug', get_query_var( 'disponibility' ), get_query_var( 'taxonomy' ) );
	$current_category = $currentdisp->name;

	$productos_seleccionados = get_field('productos_seleccionados', 18);
	$variable = get_field('productos_seleccionados');
?>


<pre><?php var_dump($productos_seleccionados); ?></pre>

<h3><?php echo $current_category; ?></h3>
<?php get_footer(); ?>