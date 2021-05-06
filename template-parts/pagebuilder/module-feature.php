    <!-- Call to Action 8 -->
    <section class="fdb-block py-0">
    <?php $image = get_sub_field('image', false); $size = 'large';?>
      <div class=" py-5 " style="background-size: cover; background-position: center; background-image: url(<?php echo wp_get_attachment_image_url($image, $size) ?>);">
        <div class="row justify-content-center py-5">
          <div class="col-12 col-md-10 col-lg-8 text-center">
            <div class="fdb-box">
              <h2><?php the_sub_field('title'); ?></h2>
              <p class="lead">
                  <?php the_sub_field('text'); ?>
              </p>
              <p class="mt-4">
                <a class="btn btn-primary" href="#header">START MY FREE CHECK</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>