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
                        <div class="col-6 content content-<?php echo $i ?>">

                            <?php the_sub_field('content'); ?>
                        </div>
                        <div class="r-content r-content-<?php echo $i ?>"><!-- empty --></div>
                    </div>
                    <div class="shape shape-<?php echo $i ?>"></div>
                    <div class="fill fill-<?php echo $i ?>"></div>
                    <!-- empty -->
                    </span>
                    <span class="backImage backImage-<?php echo $i ?>" style="background-image: url('<?php the_sub_field('background_image'); ?>')"></span>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

                <!-- 3 way  design -->
                <?php if (get_row_layout() == 'layout2') : ?>
                    <span class="clip"></span>
                    <div class="row align-items-center" style="height: 100%">
                        <div class="col-6 content content-<?php echo $i ?>">
                            <?php the_sub_field('content'); ?>
                        </div>
                        <div class="r-content r-content-<?php echo $i ?>"><!-- empty --></div>
                    </div>
                    <div class="shape shape-<?php echo $i ?>" style="background-color: #1a1e43;"></div>
                    <div class="fill fill-<?php echo $i ?>" style="background-color: #5fc4e2;"></div>
                    <span class="backImage backImage-<?php echo $i ?>" style="background-image: url('<?php the_sub_field('background_image'); ?>')"></span>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

                <!-- 2 column -->
                <?php if (get_row_layout() == 'layout3') : ?>
                    <span class="clip"></span>
                    <div class="row align-items-center" style="height: 100%">
                        <div class="col-6 content content-<?php echo $i ?>">
                            <?php the_sub_field('content_left'); ?>
                        </div>
                        <div class="col-6 r-content r-content-<?php echo $i ?>">
                            <?php the_sub_field('content_right'); ?>
                        </div>
                    </div>
                    <div class="shape shape-<?php echo $i ?>"></div>
                    <div class="fill fill-<?php echo $i ?>"></div>
                    <span class="backImage backImage-<?php echo $i ?>"></span>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

            </div>
            <?php $i++; ?>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php include 'inc/footer.php' ?>
</main>
<?php get_footer(); ?>