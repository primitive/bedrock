<?php
/**
 * Template Name: Login
 * The template for displaying simple login page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bedrock
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">

<div class="container">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					}
				}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 mx-auto">
			<?php wp_login_form(); ?>
		</div>
	</div>
</div>

</main><!-- #site-content -->


<?php get_footer(); ?>
