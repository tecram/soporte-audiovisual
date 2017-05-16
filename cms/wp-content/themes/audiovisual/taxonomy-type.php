
<?php
	get_header();

	$currentterm = get_term_by( 'slug', get_query_var( 'type' ), get_query_var( 'taxonomy' ) );
	$current_category_slug = $currentterm->slug;
	$current_category_name = $currentterm->name;
	
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
<div class="filter-container">
	<a href="" class="show-filter"><span class="icon icon-filters"></span></a>
	<div class="content container nano">
		<div class="nano-content">
			<div class="col-md-12">
				<div class="active-filter">
					<h5>Filtros:</h5>
					<div class="list"></div>
					<hr>
				</div>
				
				<form>
					<?php
						hierarchical_category_tree( 0 ); // the function call; 0 for all categories; or cat ID  
						function hierarchical_category_tree( $cat ) {
						  $next = get_categories('hide_empty=false&orderby=name&order=ASC&taxonomy=type&parent=' . $cat);

						  if( $next ) :    
							echo '<ul>';
						    foreach( $next as $cat ) :
						    echo '<li>
							<label class="form-check-label">
								<h5><input value="' . $cat->term_id . '" id="' . $cat->term_id . '" data-name="' . $cat->name . '"  class="form-check-input" type="checkbox"> ' . $cat->name . ' </h5>
							</label>';
						    // echo '<li>' . $cat->name . '</li>';
						    /*echo ' / <a href="' . get_category_link( $cat->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $cat->name ) . '" ' . '>View ( '. $cat->count . ' posts )</a>  '; */
						    /*echo ' / <a href="'. get_admin_url().'edit-tags.php?action=edit&taxonomy=category&tag_ID='.$cat->term_id.'&post_type=post" title="Edit Category">Edit</a>'; */
						    hierarchical_category_tree( $cat->term_id );
						    endforeach;
						    echo '</ul>';
						  endif;
						}
					?>
				</form>
			</div>
			<hr>
			<div class="content-buttons">
				<div class="row text-center">
					<a href="" class="btn btn-primary apply">Aplicar Filtros</a>
				</div>
				<div class="row text-center">
					<a href="" class="btn btn-default reset">Eliminar Filtros</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
	<?php if ($products->have_posts()) : ?>
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
	
<?php get_footer(); ?>