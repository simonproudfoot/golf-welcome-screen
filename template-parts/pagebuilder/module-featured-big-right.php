<?php 
  $image = get_sub_field('image', false);
  $size = 'large'; // (thumbnail, medium, large, full or custom size)
?>

<section class="fdb-block bg-light">
    <div class="col-fill-right" style="background-image: url(<?php echo wp_get_attachment_image_url($image, $size) ?>">
    </div>

    <div class="container py-5 frontMobile">
        <div class="row">
            <div class="col-12 col-md-5 text-center">
                <h1><?php the_sub_field('title'); ?></h1>
                <p class="lead"><?php the_sub_field('text'); ?></p>
              
                    <?php if(get_sub_field('link_to_page')):?>
                    <a class="btn btn-secondary" href="<?php the_sub_field('link_to_page')?>">Button</a>
                  <?php endif; ?>

            </div>
        </div>
    </div>
</section>