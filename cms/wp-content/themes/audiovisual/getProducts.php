<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	require('../../../wp-blog-header.php');
	header("HTTP/1.1 200 OK");
	
	$products = (isset($_POST['products']) ? $_POST['products'] : null);

	if($products != null && strpos($products, ",")){
		$list=explode(",", $products);
		unset($products);
		$products=array();
		foreach ($list as $value) {
			$products[]=$value;
		}
	}

	$args = array(
		'post_type' => 'products',
		'nopaging' => true,
		'tax_query' => array(
			array(
				'taxonomy' => 'type',
				'field'    => 'term_id',
				'terms'    => $products,
			),
		),
	);
	$query = new WP_Query( $args );

?>
	<?php if ($query->have_posts()) : ?>
		<section class="category-module">
			<div class="container">
				<div class="main-content">
					<?php //echo "<pre>";print_r($query);echo "</pre>"; ?>
					<div class="col-md-12">
					<?php $n = 0; 
					while ($query->have_posts()) : $query->the_post();
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
										<span class="ribbons">
											<ul>
												<li class="alquiler">Alquiler</li>
												<li class="venta">Venta</li>
												<li class="destacado"><!--&#9733;-->Destacado</li>
											</ul>
										</span>
										<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
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
						$n = 0;
					?>
						</div>
						<div class="clearfix"></div>
					<?php } ?>
					<?php $n++; endwhile; ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</section>
	<?php else : ?>
		<div class="main-content">
			<h4 class="text-center">No se encontraron productos disponibles.</h4>
		</div>
	<?php endif; ?>


<?php } ?>