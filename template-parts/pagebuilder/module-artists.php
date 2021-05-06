<?php if(basename(get_page_template()) === 'page.php'){ ?>
    </div>
<?php }?>
 <section class="section">
   <div class="container">
     <div class="row">
       <div class="col-12 col-xl-10 offset-xl-1">
         <h1 class="page-title text-center margin-top-0 margin-bottom-0">Artists</h1>
         <p class="margin-top-0 text-center "><a href="<?php site_url();?>/artists" class="color--secondary">View
             all</a></p>
         <div class="masonry indexed-list row">
           <?php
                    if ( get_query_var('paged') ) {
                        $paged = get_query_var('paged');
                    } elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
                        $paged = get_query_var('page');
                    } else {
                        $paged = 1;
                    }
                    $custom_query_args = array(
                        'post_type' => 'artists', 
                        'posts_per_page' => get_sub_field('number_of_artists'),
                        'paged' => $paged,
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => true,
                        'order' => 'DESC', // 'ASC'
                        'orderby' => 'menu', 
                    );
                    $custom_query = new WP_Query( $custom_query_args );
                    if ( $custom_query->have_posts() ) : ?>
           <?php  while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
           <a href="<?php the_permalink(); ?>" class="masonry-item indexed-list__item col-6 col-lg-4">
             <div class="indexed-list__in-view">
               <div class="speaker-neat">
                 <div class="speaker-neat__image poster in-view">
                   <figure><img class="lazyload--el lazyload in-view__child"
                       src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                       data-src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="445"
                       height="600">
                     <div class="poster--cover in-view in-view__child"></div>
                   </figure>
                 </div>
                 <div class="speaker-neat__copy in-view">
                   <h5 class="in-view__child in-view__child--fadein" style="margin-top:10px; margin-bottom: 0">
                     <?php the_title(); ?></h5>
                   <?php if(get_field('page_excerpt')): ?>
                   <small class="in-view__child in-view__child--fadein"><?php the_field('page_excerpt'); ?></small>
                   <?php endif; ?>
                 </div>
               </div>
             </div>
           </a>
           <?php endwhile ; ?>
           <?php endif; ?>
         </div>
       </div>
     </div>
   </div>
 </section>
 <?php ///if(basename(get_page_template()) === 'page.php'){ ?>
   <!--  <div class="single-content"> -->
<?php //}?>