<footer>
    <div class="row align-items-center">
        <div class="col-2">

            <img src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/youtube.svg" alt=""> <img src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/twitter.svg" alt=""> <img src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/facebook.svg" alt=""> <img src="<?php echo esc_url(get_template_directory_uri()) ?>/src/img/instagram.svg" alt="">
        </div>
        <div class="col-10">
            <vm-progress :percentage="progress" text-inside stroke-width="4" track-color="#fff" stroke-color="#5fc4e2"></vm-progress>
        </div>
    </div>
</footer>