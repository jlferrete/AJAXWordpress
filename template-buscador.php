<?php
/*
Template Name: Buscador
*/

get_header(); ?>

<div id="buscador-usuarios" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) :
			the_post();

			// Include the page content template.
			// get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) {
			//	comments_template();
			// }

			// End of the loop.
        endwhile;
		?>
        <div class="contenedor">
            <input type="search" class="search-field" id="search-field" placeholder="Introduce datos usuario" value="" name="s" autocomplete="off">
        </div>

        <div class="contenedor">
            <div class="results">
                
            </div>
        </div>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>