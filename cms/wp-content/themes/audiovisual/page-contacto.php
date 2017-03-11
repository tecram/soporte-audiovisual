<?php
	/* Template Name: Contacto */
	get_header();

	$texto = get_field('texto');
	$telefono_1 = get_field('telefono_1');
	$telefono_2 = get_field('telefono_2');
	$horario_atencion = get_field('horario_atencion');
	$email = get_field('email');

?>
<div class="container">
	<div class="main-content contact-page">
		<div class="col-md-3">
			<div class="contact-info">
				<?php echo $texto; ?>
				<div class="details">
					<p>
						<span class="icon icon-phone pull-left"></span>
						<span class="pull-left"><a href="tel:<?php echo $telefono_1; ?>"><?php echo $telefono_1; ?></a> <br><a href="tel: <?php echo $telefono_2; ?>"><?php echo $telefono_2; ?></a></span>
						<div class="clearfix"></div>
					</p>
					<div class="clearfix"></div>
					<p><span class="icon icon-watch"></span><?php echo $horario_atencion; ?></p>
					<p><span class="icon icon-email"></span><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
				</div>
			</div>
		</div>
		<?php echo do_shortcode( ' [contact-form-7 id="92" title="Contacto"] ' ); ?>
		<div class="col-md-5">
			<div class="module-header">
				<h3><span class="icon icon-location"></span> Ubicacion</h3>
			</div>
			<div class="google-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4644.247028974344!2d-58.44606207088249!3d-34.604703461125425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca115e4e1efb%3A0xc10360c2cce7eff6!2sSoporte+Audiovisual!5e0!3m2!1ses!2sar!4v1487961706833" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>