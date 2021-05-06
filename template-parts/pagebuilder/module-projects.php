 <section class="section">
            <div class="container">
              <div class="row">
                <div class="col-12 col-xl-10 offset-xl-1">
                  <div class="masonry indexed-list row">
                  <?php 
                        $posts = get_sub_field('select_projects');
                        if( $posts ): ?>
                        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                        <?php setup_postdata($post);?>
                        <?php // echo $pagetitle; ?>
                    <a href="<?php the_permalink($post); ?>" class="masonry-item indexed-list__item col-6 col-lg-4">
                      <div class="indexed-list__in-view">
                        <div class="speaker-neat">
                          <div class="speaker-neat__image poster in-view">
                            <figure><img class="lazyload--el lazyload in-view__child"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="445" height="600">
                              <div class="poster--cover in-view in-view__child"></div>
                            </figure>
                          </div>
                          <div class="speaker-neat__copy in-view">
                            <h5 class="in-view__child in-view__child--fadein margin-top-0"><?php the_title(); ?></h5>
                          </div>
                        </div>
                      </div>
                    </a>
                  <?php endforeach; ?>
                        <?php endif;
                        wp_reset_postdata(); ?>
                  </div>
                </div>
              </div>
            </div>
          </section>