<?php 
if( have_rows('add_section') ):
    while ( have_rows('add_section') ) : the_row(); // start sections ?>
<?php if( get_row_layout() == 'one_text_column' && get_sub_field('hide') == false): // One column ?>
<?php include 'module-one-text-column.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php if( get_row_layout() == 'two_text_column' && get_sub_field('hide') == false): // One column ?>
<?php include 'module-two-text-columns.php' ?>

<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php if( get_row_layout() == 'gallery' && get_sub_field('hide') == false): // Lightroom gallery ?>
<?php include 'module-gallery.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php if( get_row_layout() == 'related' && get_sub_field('hide') == false): // Related posts ?>
<?php include 'module-related.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php if( get_row_layout() == 'twitter_feed' && get_sub_field('hide') == false): // twitter ?>
<?php include 'module-twitterfeed.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php if( get_row_layout() == 'testimonials_block' && get_sub_field('hide') == false): // testimonials ?>
<?php include 'module-testimonials.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php if( get_row_layout() == 'featured' && get_sub_field('hide') == false): ?>
<?php include 'module-feature.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php if( get_row_layout() == 'featured_big_left' && get_sub_field('hide') == false):  ?>
<?php include 'module-featured-big-left.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php if( get_row_layout() == 'featured_big_right' && get_sub_field('hide') == false):  ?>
<?php include 'module-featured-big-right.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php if( get_row_layout() == 'countdown' && get_sub_field('hide') == false):  ?>
<?php include 'module-countdown.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php if( get_row_layout() == 'latest_news' && get_sub_field('hide') == false): ?>
<?php include 'module-news.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php if( get_row_layout() == 'projects_list' && get_sub_field('hide') == false): ?>
<?php include 'module-projects.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php if( get_row_layout() == 'artist_list' && get_sub_field('hide') == false):?>
<?php include 'module-artists.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php if( get_row_layout() == 'iconcolumns' && get_sub_field('hide') == false):?>
<?php include 'module-iconCols.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php if( get_row_layout() == 'big_feature_image' && get_sub_field('hide') == false): ?>
<?php include 'module-featured-image.php' ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

