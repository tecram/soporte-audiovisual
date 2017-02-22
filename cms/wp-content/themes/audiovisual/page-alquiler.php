<?php
	/* Template Name: Alquiler */
	get_header();

	$slider = get_field('slide');
	$productos = get_field('productos');
	$currentdisp = get_term_by( 'slug', get_query_var( 'disponibilidad' ), get_query_var( 'taxonomy' ) );
?>
<pre><?php var_dump($currentdisp); ?></pre>
<!-- SLIDER -->
<?php foreach ($slider as $slide => $value) { ?>
	<p><?php echo $value['volanta']; ?></p>
	<h1><?php echo $value['titulo']; ?></h1>
	<p><?php echo $value['breve_descripcion']; ?></p>
	<p><img src="<?php echo $value['imagen']; ?>"></p>
	<hr>
<?php } ?>
<!-- SLIDER -->


<!-- PRODUCTOS -->
<?php foreach ($productos as $producto => $value) { 
	$categoria = $value['elige_categoria'];
	$elige_productos = $value['elige_productos'];
?>
	<img src="<?php echo $value['icono_de_categoria']; ?>">
	<p><?php echo $categoria->name; ?></p>
	<?php foreach ($elige_productos as $producto_elegido => $valor) { 
		setup_postdata($producto_elegido);
		$post_id = $valor['elige_producto'][0];
		$brand = get_field('marca', $post_id);
		$short_description = get_field('descripcion', $post_id);
	?>
		<h1><?php echo get_the_title($post_id); ?></h1>
		<p><?php echo $brand; ?></p>
		<p><?php echo $short_description; ?></p>
		<a href="<?php echo get_the_permalink($post_id); ?>">Link</a>
		<br>
	<?php } ?>


	<hr>
<?php } ?>
<!-- PRODUCTOS -->




<?php get_footer(); ?>