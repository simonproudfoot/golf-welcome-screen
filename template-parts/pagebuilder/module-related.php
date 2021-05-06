<?php $posts = get_field('related_block');
                    if( $posts ): ?>
<section class="section background-color--code-background">
    <div class="container">
        <div class="row in-view">
            <div class="col-12 col-xl-10 offset-xl-1">
                <p class="text-center">
                    <span class="sub-head color--body-lighten">You might also like</span>
                </p>
                <div class="related row">
                 
                    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                        <?php setup_postdata($post);?>
                       
                    <article class="related__item col-12 col-md-4">
                        <div class="related__box">
                            <div class="related__box__background lazyload lazyload--el">
                                <img class="lozad" src="<?php echo get_the_post_thumbnail_url($post, 'thumb-A-small'); ?>">
                            </div>
                            <div class="related__box__table">
                                <div class="related__box__cell">
                                    <h2 class="related__box__title"><?php the_title(); ?></h2>
                                </div>
                            </div>
                            <a class="related__box__link" href="<?php the_permalink(); ?>">
                                <span class="sr-only"><?php the_title(); ?></span>
                            </a>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>