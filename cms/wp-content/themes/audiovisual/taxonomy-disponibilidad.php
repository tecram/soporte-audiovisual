<?php
	get_header();
	$currentdisp = get_term_by( 'slug', get_query_var( 'disponibilidad' ), get_query_var( 'taxonomy' ) );
	$current_category = $currentdisp->slug;

	$args = array(
        'post_type' => 'products',
        'tax_query' => array(
			array(
				'taxonomy' => 'disponibilidad',
				'field'    => 'slug',
				'terms'    => $current_category,
			)
		),
			'posts_per_page'	=> -1
    );
	
	$query = new WP_Query($args);

?>
<!-- <pre><?php var_dump($query); ?></pre> -->
<?php
	if ($query->have_posts()) : 
		while ($query->have_posts()) : $query->the_post();
			$slider = get_field('slide');
			$products = get_field('productos');
?>
			<pre><?php var_dump($products); ?></pre>
<?php endwhile; endif; ?>





<h3><?php echo $current_category; ?></h3>
<section class="projectors-module">
	<div class="module-header">
		<h3><span class="icon icon-lens"></span> Lentes</h3>
	</div>
	<div class="clearfix"></div>
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
<div class="clearfix"></div>
<?php get_footer(); ?>