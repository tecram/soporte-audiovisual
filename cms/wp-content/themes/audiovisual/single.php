<?php get_header(); ?>

	<?php if (have_posts()): while (have_posts()) : the_post();
		$post_id = get_the_ID();
		$subtitulo = get_field('subtitulo');
		$breve_descripcion = get_field('breve_descripcion');
		$descripcion = get_field('descripcion');
		$especificaciones = get_field('especificaciones');
		$descargas = get_field('descargas');
		$productos_relacionados = get_field('productos_relacionados');
		$big_image = get_the_post_thumbnail_url($post_id, $size = 'big-product');
	?>
		<div class="container">
			<div class="main-content product-detail-page">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><span class="icon icon-projector"></span> <a href="#">Proyectores</a></li>
					<li class="breadcrumb-item"><a href="#">Full HD</a></li>
					<li class="breadcrumb-item active">BARCO RLM-W14</li>
				</ol>
				<div class="clearfix"></div>
				<div class="col-md-12">
					<div class="product-a">
						<div class="row">
							<div class="col-md-6">
								<div class="content-detail">
									<h3 class="title"><?php the_title(); ?></h3>
									<h4 class="sub-title"><?php echo $subtitulo; ?></h4>
									<hr>
									<div class="description">
										<p><?php echo $breve_descripcion; ?></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="content-img">
									<img src="<?php echo $big_image; ?>" alt="...">
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Descripcion</a></li>
						<?php if ($especificaciones) { ?><li role="presentation"><a href="#specifications" aria-controls="specifications" role="tab" data-toggle="tab">Especificaciones</a></li><?php } ?>
						<?php if (!empty($descargas)) { ?><li role="presentation"><a href="#download" aria-controls="download" role="tab" data-toggle="tab">Descargas</a></li><?php } ?>
					</ul>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="description">
							<?php echo $descripcion; ?>
						</div>
						<div role="tabpanel" class="tab-pane" id="specifications">
							<?php echo $especificaciones; ?>
						</div>
						<div role="tabpanel" class="tab-pane" id="download">
							<?php foreach ($descargas as $descarga) { ?>
								<a href="<?php echo $descarga['archivo_de_descarga']; ?>" target="_blank"><?php echo $descarga['titulo_de_descarga']; ?></a>
								<br>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<?php if (!empty($productos_relacionados)) { ?>
						<hr class="separator">
						<div class="related-products">
							<h4 class="title">Productos Relacionados</h4>
							<div class="row">	
								<?php foreach ($productos_relacionados as $id) {
									$post_id = $id;
									$subtitulo = get_field('subtitulo', $post_id);
									$breve_descripcion = get_field('breve_descripcion', $post_id);
									$small_image = get_the_post_thumbnail_url($post_id, $size = 'small-product');

								?>
									<div class="col-md-3">
										<div class="product-b">
											<div class="content-img">
												<img src="<?php echo $small_image; ?>" alt="...">
											</div>
											<div class="content-detail">
												<h3 class="title"><?php echo get_the_title($post_id); ?></h3>
												<h4 class="sub-title"><?php echo $subtitulo; ?></h4>
												<hr>
												<div class="description">
													<p><?php echo $breve_descripcion; ?></p>
												</div>
												<a class="show-more btn btn-primary" href="<?php echo get_the_permalink($post_id); ?>">Ver mas</a>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
				<?php } ?>
			</div>
		</div>
	<?php endwhile; endif; ?>

<?php get_footer(); ?>