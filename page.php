<?php
get_header();
?>
<main class="main">
    <?php
    $i = 0;
    if (have_rows('add_section')) :
        
        while (have_rows('add_section')) : the_row();
      
    ?>
            <div class="main__inner">
                <!-- simple design -->
                <?php if (get_row_layout() == 'layout1') : ?>
                    <span class="clip"></span>
                    <div class="row align-items-center" style="height: 100%">
                        <div class="col-6 content content-<?php echo $i?>">
                            <?php the_sub_field('content'); ?>
                        </div>
                    </div>
                    <span class="backImage backImage-<?php echo $i?>" style="background-image: url('<?php the_sub_field('background_image'); ?>')"></span>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

                <!-- 3 was design -->
                <?php if (get_row_layout() == 'layout2') : ?>
                    <span class="clip"></span>
                    <div  class="row align-items-center" style="height: 100%">
                        <div class="col-6 content content-<?php echo $i?>">
                            <?php the_sub_field('content'); ?>
                        </div>
                    </div>
                    <span class="backImage backImage-<?php echo $i?>" style="background-image: url('<?php the_sub_field('background_image'); ?>')"></span>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

            </div>
            <?php $i++; ?>
        <?php endwhile; ?>
    <?php endif; ?>
  <?php include 'inc/footer.php'?>
</main>
<?php get_footer(); ?>