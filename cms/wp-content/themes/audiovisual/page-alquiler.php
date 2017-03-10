<?php
	/* Template Name: Alquiler */
	get_header();

	$slider = get_field('slide');
	$productos = get_field('productos_seleccionados');
	$currentdisp = get_term_by( 'slug', get_query_var( 'disponibilidad' ), get_query_var( 'taxonomy' ) );
?>

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
	$categoria = $value['seleccione_categoria'];
	$elige_productos = $value['elige_productos'];
?>
	<img src="<?php echo $value['icono_de_categoria']; ?>">
	<p><?php echo $categoria->name; ?></p>
	<br><br><br>



	<section class="projectors-module">
		<div class="module-header">
			<h3><span class="icon icon-lens"></span> Lentes</h3>
		</div>
		<div class="clearfix"></div>
	
	<?php $f = 0; foreach ($elige_productos as $producto_elegido) : 
		setup_postdata($producto_elegido);
		$post_id = $producto_elegido;
		$brand = get_field('marca', $post_id);
		$short_description = get_field('descripcion', $post_id);
		
		if ($f == 0) {
			$image = get_the_post_thumbnail_url($post_id, $size = 'big-product');
		}
		else {
			$image = get_the_post_thumbnail_url($post_id, $size = 'small-product');
		}
	?>
		<h1><?php echo get_the_title($post_id); ?></h1>
		<img src="<?php echo $image; ?>">
		<p><?php echo $brand; ?></p>
		<p><?php echo $short_description; ?></p>
		<a href="<?php echo get_the_permalink($post_id); ?>">Link</a>
		<br><br><br>

		<?php if ($f == 0) : ?>
			<div class="col-md-6">
				<div class="product-a">
					<div class="content-img">
						<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=570%C3%97300&w=560&h=300" alt="...">
					</div>
					<div class="content-detail">
						<h3 class="title">BARCO RLM-W14</h3>
						<h4 class="sub-title">14.500 Lumens WUXGA</h4>
						<hr>
						<div class="description">
							<p>El RLM-W14 presenta un elegante diseño de proyector con un montaje de objetivo muy estable, y ofrece estéreo activo 3D y vídeo a través de un cable único de categoría 5 (HDBaseTTM). Está diseñado para una instalación fija en museos, teatros, templos de culto, hoteles, aulas o auditorios de conferencias, aunque también puede usarse en el mercado de alquiler, gracias a su corrección geométrica y mezclado ampliados, su chasis robusto y su bastidor de alquiler opcional.El RLM-W14 presenta un elegante diseño de proyector con un montaje de objetivo muy estable, y ofrece estéreo activo 3D y vídeo a través de un cable único de categoría 5 (HDBaseTTM). Está diseñado para una instalación fija en museos, teatros, templos de culto, hoteles, aulas o auditorios de conferencias, aunque también puede usarse en el mercado de alquiler, gracias a su corrección geométrica y mezclado ampliados, su chasis robusto.</p>
						</div>
						<a class="show-more btn btn-primary" href="">Ver mas</a>
					</div>
				</div>
			</div>
		<?php else : ?>
						<div class="col-md-6">
							<div class="col-md-6">
								<div class="product-b">
									<div class="content-img">
										<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=250%C3%97150&w=250&h=150" alt="...">
									</div>
									<div class="content-detail">
										<h3 class="title">BARCO RLM-W14</h3>
										<h4 class="sub-title">14.500 Lumens WUXGA</h4>
										<hr>
										<div class="description">
											<p>El RLM-W14 presenta un elegante diseño de proyector con un montaje de objetivo muy estable.</p>
										</div>
										<a class="show-more btn btn-primary" href="">Ver mas</a>
									</div>
								</div>
							</div>
						</div>
								
				</section>
			</div>
</div>
		
			<div class="clearfix"></div>
		<?php endif; ?>
	<?php $f++; endforeach; ?>


	<hr>
<?php } ?>
<!-- PRODUCTOS -->




	
	<!-- <div class="col-md-6">
		<div class="col-md-6">
			<div class="product-b">
				<div class="content-img">
					<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=250%C3%97150&w=250&h=150" alt="...">
				</div>
				<div class="content-detail">
					<h3 class="title">BARCO RLM-W14</h3>
					<h4 class="sub-title">14.500 Lumens WUXGA</h4>
					<hr>
					<div class="description">
						<p>El RLM-W14 presenta un elegante diseño de proyector con un montaje de objetivo muy estable.</p>
					</div>
					<a class="show-more btn btn-primary" href="">Ver mas</a>
				</div>
			</div>
		</div>	
		<div class="col-md-6">
			<div class="product-b">
				<div class="content-img">
					<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=250%C3%97150&w=250&h=150" alt="...">
				</div>
				<div class="content-detail">
					<h3 class="title">BARCO RLM-W14</h3>
					<h4 class="sub-title">14.500 Lumens WUXGA</h4>
					<hr>
					<div class="description">
						<p>El RLM-W14 presenta un elegante diseño de proyector con un montaje de objetivo muy estable.</p>
					</div>
					<a class="show-more btn btn-primary" href="">Ver mas</a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="product-b">
				<div class="content-img">
					<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=250%C3%97150&w=250&h=150" alt="...">
				</div>
				<div class="content-detail">
					<h3 class="title">BARCO RLM-W14</h3>
					<h4 class="sub-title">14.500 Lumens WUXGA</h4>
					<hr>
					<div class="description">
						<p>El RLM-W14 presenta un elegante diseño de proyector con un montaje de objetivo muy estable.</p>
					</div>
					<a class="show-more btn btn-primary" href="">Ver mas</a>
				</div>
			</div>
		</div>	
		<div class="col-md-6">
			<div class="product-b">
				<div class="content-img">
					<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=250%C3%97150&w=250&h=150" alt="...">
				</div>
				<div class="content-detail">
					<h3 class="title">BARCO RLM-W14</h3>
					<h4 class="sub-title">14.500 Lumens WUXGA</h4>
					<hr>
					<div class="description">
						<p>El RLM-W14 presenta un elegante diseño de proyector con un montaje de objetivo muy estable.</p>
					</div>
					<a class="show-more btn btn-primary" href="">Ver mas</a>
				</div>
			</div>
		</div>
	</div>
	</div>			
</section>
	</div>
</div>
<div class="clearfix"></div> -->
<?php get_footer(); ?>