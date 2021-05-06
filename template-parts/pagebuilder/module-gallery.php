<?php if(basename(get_page_template()) === 'page.php'){ ?>
    </div>
<?php }?>
<section class="gallery" style="margin: 4em 0">
        <?php 
            $images = get_sub_field('the_gallery');
            $grid_size = get_sub_field('grid_size');
            if (wp_is_mobile()){
                $thumb = 'gallery-thumbnail-small';
           //    echo 'is mobile';
            }else{
            // echo 'isnt mobile';
                if($grid_size == 'col-md-4'){
                    $thumb = 'gallery-thumbnail-large';    
                }elseif($grid_size == 'col-md-3'){
                    $thumb = 'gallery-thumbnail-medium';
                }
                else{
                    $thumb = 'gallery-thumbnail-small';
                }
            }
             $large = 'large';
            if( $images ): ?>
            <div class="lightboxgallery-gallery row no-gutters ">
                <?php foreach( $images as $image ): ?>
                    <a class="lightboxgallery-gallery-item col-6 matchheight background-cover <?php echo $grid_size; ?>" target="_blank" href="<?php echo wp_get_attachment_image_url( $image['ID'], $large ); ?>"
                        data-title="<?php echo $image['caption']; ?>" data-alt="<?php //echo $image['caption']; ?>" data-background-image="<?php echo wp_get_attachment_image_url( $image['ID'], $thumb ); ?>">
                        <div style="border: 1px #fff solid">
                            <img src="<?php echo wp_get_attachment_image_url( $image['ID'], $thumb ); ?>"  alt="<?php //echo $image['caption']; ?>">
                            <div class="lightboxgallery-gallery-item-content">
                                <span class="lightboxgallery-gallery-item-title"><?php //echo $image['caption']; ?></span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
            </div>
            <div class="clearfix"></div>
            <?php endif; ?>
</section>
<?php if(basename(get_page_template()) === 'page.php'){ ?>
    <div class="single-content">
<?php }?>



