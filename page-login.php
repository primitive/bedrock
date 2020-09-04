<?php
/**
 * The template for displaying simple login page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bedrock
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php wp_login_form(); ?>

	<?php
		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );
			}
		}
	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
