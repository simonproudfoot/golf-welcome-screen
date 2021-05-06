	<?php
   // SECTION BEGIN
   if (have_rows('add_section')) :
      while (have_rows('add_section')) : the_row(); // start sections 
   ?>
          
			 <?php if (get_row_layout() == 'layout1') : // Custom row ?>
			hello
				<?php wp_reset_postdata(); ?>
          
        
           
	<?php endwhile; ?>
<?php endif; ?>