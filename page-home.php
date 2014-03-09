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
        $count = 1;
          while ( have_rows('section') ) : the_row();
 
              // display a sub field value
              $headline = get_sub_field('headline');
              $subhead = get_sub_field('subhead');
              $text_style = get_sub_field('text_style');
              $image = get_sub_field('background_image');
          ?>
          <div class="group group<?php echo $count; ?>" data-background="<?php echo $image['url']; ?>">
              <div class="headsubhead <?php echo $text_style;  ?>">
                  <h1 class="headline"><?php echo $headline; ?></h1>
                  <h2 class="subhead"><?php echo $subhead; ?></h2>
              </div>
              <div class="groupbackground">
                <img class="groupimage" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
              </div>
          </div>
          
        <?php $count++; ?>
        <?php endwhile; ?>
 
      <?php else :
 
          echo "No content in our repeater!";
 
      endif;
 
      ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
