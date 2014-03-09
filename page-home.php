<?php
/**
 * Template Name: Home Page
 *
 * @package sanctuary
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <?php
 
      // check if the repeater field has rows of data
      if( have_rows('section') ):
 
       	// loop through the rows of data
          while ( have_rows('section') ) : the_row();
 
              // display a sub field value
              $headline = get_sub_field('headline');
              $subhead = get_sub_field('subhead');
              $text_style = get_sub_field('text_style');
              $image = get_sub_field('background_image');
 
          endwhile;
 
      else :
 
          echo "No content in our repeater!";
 
      endif;
 
      ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
