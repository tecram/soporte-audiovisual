<?php
	get_header();

	$currentterm = get_term_by( 'slug', get_query_var( 'type' ), get_query_var( 'taxonomy' ) );
	$current_category_slug = $currentterm->slug;
	
	$terms = array(
		'post_type' => 'products',
		'posts_per_page'	=> -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'type',
				'field'    => 'slug',
				'terms'    => $current_category_slug,
			),
		),
	);
	$products = new WP_Query ($terms);
?>
	<?php if ($products->have_posts()) : ?>
		<section class="projectors-module">
		<?php $n = 0; 
		while ($products->have_posts()) : $products->the_post();
			$post_id = get_the_ID();
			$image = get_the_post_thumbnail_url($post_id, $size = 'small-product');
			$title = get_the_title($post_id);
			$subtitle = get_field('subtitulo', $post_id);
			$small_description = get_field('breve_descripcion', $post_id);
			$product_link = get_the_permalink($post_id);
			$taxonomies = get_terms( array( 'taxonomy' => 'disponibility' ));
			
		?>
		<?php
		if ($n == 0) { ?>
			<div class="row">
		<?php } ?>
				<div class="col-md-3">
					<div class="product-b">
						<div class="content-img">
							<img src="<?php echo $image; ?>" alt="">
						</div>
						<div class="content-detail">
							<h3 class="title"><?php echo $title; ?></h3>
							<h4 class="sub-title"><?php echo $subtitle; ?></h4>
							<hr>
							<div class="description">
								<p><?php echo $small_description; ?></p>
							</div>
							<a class="show-more btn btn-primary" href="<?php echo $product_link; ?>">Ver mas</a>
						</div>
					</div>
				</div>

		<?php if ($n == 3) { 
			$n = 0;
		?>
			</div>
			<div class="clearfix"></div>
		<?php } ?>
		<?php $n++; endwhile; ?>
			<div class="clearfix"></div>
		</section>
	<?php endif; ?>
	
<?php get_footer(); ?>