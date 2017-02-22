<?php
	get_header();

	$currentdisp = get_term_by( 'slug', get_query_var( 'disponibilidad' ), get_query_var( 'taxonomy' ) );
?>
<pre><?php var_dump($currentdisp); ?></pre>

<?php get_footer(); ?>