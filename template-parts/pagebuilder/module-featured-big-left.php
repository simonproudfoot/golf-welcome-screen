<?php 
  $image = get_sub_field('image', false);
  $size = 'large'; // (thumbnail, medium, large, full or custom size)
?>
<section class="fdb-block bg-light">
    <div class="container py-5">
        <div class="row justify-content-md-end">
            <div class="col-12 offset-6 col-md-5 text-center frontMobile">
                <h1><?php the_sub_field('title'); ?></h1>
                <p class="lead"><?php the_sub_field('text'); ?></p>
              
                    <?php if(get_sub_field('link_to_page')):?>
                    <a class="btn btn-secondary" href="<?php the_sub_field('link_to_page')?>">Button</a>
                  <?php endif; ?>

            </div>
        </div>
        <div class="col-fill-left" style="background-image: url(<?php echo wp_get_attachment_image_url($image, $size) ?>">
    </div>
    </div>
 
</section>