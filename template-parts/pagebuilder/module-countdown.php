<?php if(basename(get_page_template()) === 'page.php'){ ?>
    </div>
<?php }?>

<section class="pl-5 pr-5">
    <div class="container">
        <h3 class="text-center color--secondary">
            Coming soon</h3>
        <div class="countdown row justify-content-center" data-count="<?php the_sub_field('date'); ?> <?php the_sub_field('hours'); ?>:00:00">
            <div class="countdown__el col-12 col-md-3" data-display="days">
                <h4>
                    <div class="countdown__count">00</div>
                </h4>
                <div class="countdown__label">Days</div>
            </div>
            <div class="countdown__el col-12 col-md-3" data-display="hours">
                <h4>
                    <div class="countdown__count">00</div>
                    <div>
                </h4>
                <div class="countdown__label">Hours</div>
            </div>
            <div class="countdown__el col-12 col-md-3" data-display="minutes">
                <h4>
                    <div class="countdown__count">00</div>
                </h4>
                <div class="countdown__label">Minutes</div>
            </div>
            <div class="countdown__el col-12 col-md-3" data-display="seconds">
                <h4>
                    <div class="countdown__count">00</div>
                </h4>
                <div class="countdown__label">Seconds</div>
            </div>
        </div>
    </div>
</section>

<?php if(basename(get_page_template()) === 'page.php'){ ?>
    <div class="single-content">
<?php }?>