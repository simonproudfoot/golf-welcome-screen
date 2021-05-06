<section class="section section--singular ">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-10 offset-xl-1">
                <h1 class="page-title margin-top-0 margin-bottom-0">Latest news</h1>
                <p class="margin-top-0 margin-bottom-1"><a href="<?php site_url();?>/latest-news" class="color--secondary">View all</a></p>
                <div class="row margin-top-1">
                    <div class="col-12 col-xl-10 offset-xl-1">
                        <div class="blog-list in-view">
                        <?php
                        if ( get_query_var('paged') ) {
                            $paged = get_query_var('paged');
                        } elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
                            $paged = get_query_var('page');
                        } else {
                            $paged = 1;
                        }
                        $custom_query_args = array(
                            'post_type' => 'post', 
                            'posts_per_page' => get_sub_field('number_of_posts'),
                            'paged' => $paged,
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true,
                            'order' => 'DESC', // 'ASC'
                            'orderby' => 'date', 
                        );
                        $custom_query = new WP_Query( $custom_query_args );
                        if ( $custom_query->have_posts() ) : ?>
                            <?php  while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                            <div class="blog-list__post in-view__child in-view__child--fadein"><span
                                    class="blog-list__info sub-head"><?php get_the_date();?></span>
                                <h5 class="blog-list__title"> <a
                                        href="<?php the_permalink(); ?>"></a><?php the_title(); ?></a></h5>
                                <p class="blog-list__link text-xl-right"><a class="sub-head dashed dashed--reverse--md in-view__child"  href=" <?php the_permalink(); ?>">Read the Story</a></p>
                                <?php if(get_field('page_excerpt')): ?>
                              <small class="in-view__child in-view__child--fadein"><?php the_field('page_excerpt'); ?></small>
                            <?php endif; ?>
                            </div>
                            <?php endwhile ; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>