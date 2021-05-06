<?php if(basename(get_page_template()) === 'page.php'){ ?>
    </div>
<?php }?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 text-centre">
        <?php 
            $image = get_sub_field('the_image', false);
            $size = 'header-huge'; // (thumbnail, medium, large, full or custom size)
            echo '<img class="full-width" src="'.wp_get_attachment_image_url($image, $size).'">'
        ?>
        </div>
        <div class="col-12 col-sm-10 text-center">
            <p><?php the_sub_field('caption');?></p>
        </div>
    </div>
</div>
<?php if(basename(get_page_template()) === 'page.php'){ ?>
    <div class="single-content">
<?php }?>