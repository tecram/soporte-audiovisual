<?php
	/* Template Name: Alquiler */
	get_header();

	$slider = get_field('slide');
	$productos = get_field('productos_seleccionados');
	$currentdisp = get_term_by( 'slug', get_query_var( 'disponibilidad' ), get_query_var( 'taxonomy' ) );
	$page_id = 24;
	$productos_seleccionados = get_field('productos_seleccionados', $page_id);
	$slider = get_field('slider', $page_id);
?>

<div class="container">
	<div class="main-content alquiler-page">

	<?php if (!empty($slider)) : ?>
		<div class="col-md-12">
			<div class="slick-slider">
					<?php
					$h = 0;
					foreach ($slider as $key) { ?>
						<?php
							$volanta = $key['volanta'];
							$titulo = $key['titulo'];
							$breve_descripcion = $key['breve_descripcion'];
							$imagen = $key['imagen'];
						?>
						<div class="item">
							<h3><?php echo $volanta; ?></h3>
							<h2><?php echo $titulo; ?></h2>
							<img src="<?php echo $imagen; ?>" alt="...">
							<p><?php echo $breve_descripcion; ?></p>
						</div>
						<!-- <div class="item"><img src="/assets/images/slider/slider.jpg" alt="..."></div>
						<div class="item"><img src="/assets/images/slider/slider.jpg" alt="..."></div> -->
					<?php $h++; } ?>
			</div>
		</div>
	<?php endif; ?>		


		<?php
		if (!empty($productos_seleccionados)) :
				
				$f = 0;
				foreach ($productos_seleccionados as $key) {
					$icono_de_categoria = $productos_seleccionados[$f]['icono_de_categoria'];
					$productos = $productos_seleccionados[$f]['elige_productos'];
			?>
			<section class="projectors-module">
				<div class="module-header">
					<h3><?php if (!empty($icono_de_categoria)) { ?><span class="icon" style="background: url('<?php echo $icono_de_categoria; ?>') no-repeat center center;"></span><?php } ?><?php echo $productos_seleccionados[0]['seleccione_categoria']->name ?></h3>
				</div>
				<div class="clearfix"></div>

							<?php $i = 0;
							foreach ($productos as $key) {
								$title = get_the_title($key);
								$subtitle = get_field('subtitulo', $key);
								$small_description = get_field('breve_descripcion', $key);
								$product_link = get_the_permalink($key);

								$important = get_field('destacado', $key);
								$post_terms = get_the_terms( $key , 'disponibility' );
								$post_categories = array();
								
								foreach ($post_terms as $tax) {
									$post_categories[] = $tax->slug;
								}
								$product_categories = join( " ", $post_categories );

								$destacado = '';
								if ($important) {
									$destacado = ' destacado';
								}


								if ($i == 0) : 
									$image = get_the_post_thumbnail_url($key, $size = 'big-product');
									if (empty($image)) {
										$image = 'http://placehold.it/570x300';
									}
								?>
									<div class="col-md-6">
										<div class="product-a <?php echo $product_categories; echo $destacado; ?>">
											<div class="content-img">
												<img src="<?php echo $image; ?>" alt="...">
											</div>
											<div class="content-detail">
												<h3 class="title"><?php echo $title; ?></h3>
												<h4 class="sub-title"><?php echo $subtitle; ?></h4>
												<hr>
												<div class="description">
													<?php echo $small_description; ?>
												</div>
												<a class="show-more btn btn-primary" href="<?php echo $product_link; ?>">+</a>
											</div>
										</div>
									</div>
									<div class="col-md-6">
								<?php else : 
									$image = get_the_post_thumbnail_url($key, $size = 'small-product');
									if (empty($image)) {
										$image = 'http://placehold.it/250x150';
									}
								?>
										<div class="col-md-6">
									        <div class="product-b <?php echo $product_categories; echo $destacado; ?>">
								                <div class="content-img">
								                    <img src="<?php echo $image; ?>" alt="...">
								                </div>
								                <div class="content-detail">
								                    <h3 class="title"><?php echo $title; ?></h3>
								                    <h4 class="sub-title"><?php echo $subtitle; ?></h4>
								                    <hr>
								                    <div class="description">
								                        <?php echo $small_description; ?>
								                    </div>
								                    <a class="show-more btn btn-primary" href="<?php echo $product_link; ?>">+</a>
								                </div>
								            </div>
									    </div>
								<?php endif; ?>
								
							<?php $i++; } ?>
							<div class="clearfix"></div>
			</section>
			<div class="clearfix"></div>
				<?php $f++; } ?>
		<?php else : ?>

			<!-- Taxonomy childrens -->
			<?php if ($products->have_posts()) :
				$h = 0;
				while ($products->have_posts()) :
					$products->the_post();
					
					$current_id = get_the_ID();
					$image = get_the_post_thumbnail_url();
					$title = get_field('post_title');
					$subtitle = get_field('subtitulo');
					$short_description = get_field('breve_descripcion');
					$product_link = get_the_permalink();
			?>
					<?php if ($h == 0) : ?>
						<div class="col-md-12">
					<?php endif; ?>
							<div class="col-md-2">
					            <div class="product-b">
					                <div class="content-img">
					                    <img src="<?php echo $image; ?>" alt="">
					                </div>
					                <div class="content-detail">
					                    <h3 class="title"><?php echo $title; ?></h3>
					                    <h4 class="sub-title"><?php echo $subtitle; ?></h4>
					                    <hr>
					                    <div class="description">
					                        <?php echo $short_description; ?>
					                    </div>
					                    <a class="show-more btn btn-primary" href="<?php echo $product_link; ?>">+</a>
					                </div>
					            </div>
					        </div>
			        <?php if ($h == 5) : ?>
			        	</div>
			        	<div class="clearfix"></div>
			        <?php endif; ?>
			        <?php 
			        	$h++; 
			        	if ($h == 6) { $h = 0; }
			        ?>
				<?php endwhile; ?>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
<!-- Taxonomy childrens -->
<?php get_footer(); ?>
<?php get_footer(); ?>