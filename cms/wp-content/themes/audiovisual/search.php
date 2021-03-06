<?php get_header(); ?>
<div class="container main-content">
	<div class="col-md-12">
		<h4><?php echo sprintf( __( '%s Resultados de búsqueda de ', 'html5blank' ), $wp_query->found_posts ); echo "<b>" . get_search_query() . "<b>"; ?></h4>
		<?php if (have_posts()) : ?>
			<section class="category-module">
			<div class="container">
				<div class="main-content">
					<h1><?php echo $current_category_name; ?></h1>
					<div class="col-md-12">
					<?php $n = 0; 
					while ($products->have_posts()) : $products->the_post();
						$post_id = get_the_ID();
						$image = get_the_post_thumbnail_url($post_id, $size = 'small-product');
						$title = get_the_title($post_id);
						$subtitle = get_field('subtitulo', $post_id);
						$small_description = get_field('breve_descripcion', $post_id);
						$product_link = get_the_permalink($post_id);
						$taxonomies = get_terms( array( 'taxonomy' => 'disponibility' ));
						$important = get_field('destacado');
						$post_terms = get_the_terms( $post->ID , 'disponibility' );
						$post_categories = array();
						
						foreach ($post_terms as $tax) {
							$post_categories[] = $tax->slug;
						}
						$product_categories = join( " ", $post_categories );

						$destacado = '';
						if ($important) {
							$destacado = ' destacado';
						}
					?>
					<?php
					if ($n == 0) { ?>
						<div class="row">
					<?php } ?>
							<div class="col-md-2 <?php echo $product_categories; echo $destacado; ?>">
								<div class="product-b">
									<div class="content-img">
										<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
										<span class="ribbons">
											<ul>
												<li class="alquiler">Alquiler</li>
												<li class="venta">Venta</li>
												<li class="destacado"><!--&#9733;-->Destacado</li>
											</ul>
										</span>
									</div>
									<div class="content-detail">
										<h3 class="title"><?php echo $title; ?></h3>
										<h4 class="sub-title"><?php echo $subtitle; ?></h4>
										<hr>
										<div class="description">
											<p><?php echo $small_description; ?></p>
										</div>
										<a class="show-more btn btn-primary" href="<?php echo $product_link; ?>">+</a>
									</div>
								</div>
							</div>
					
					<?php if ($n == 5) { 
					?>
						</div>
						<div class="clearfix"></div>
					<?php } ?>
					<?php $n++; 
					if($n == 6){
						$n = 0;
					}
					endwhile; ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</section>
		<?php else : ?>
			<h4 class="text-center">No se encontraron productos disponibles.</h4>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>
