<?php
	get_header();
	$currentdisp = get_term_by( 'slug', get_query_var( 'disponibilidad' ), get_query_var( 'taxonomy' ) );
	$current_category = $currentdisp->term_id;

?>

asd

<?php get_footer(); ?>