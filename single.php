<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mediamaze-starter
 */
get_header();
?>
	<main id="primary" class="site-main">
	<section class="fdb-block" style="background-image: url(<?php echo the_post_thumbnail_url(); ?>);">
        <div class="container">
            <div class="row text-left justify-content-start">
                <div class="col-12 col-md-6 col-xl-5">
                    <div class="fdb-box rounded-bottom-0">
                        <h1><?php the_title() ?></h1>
                        <?php the_field('page_intro'); ?>
                    </div>
                </div>
            </div>
        </div>
	</section>
		<?php
		include "template-parts/pagebuilder/page-builder.php";
		
		?>
	</main><!-- #main -->
<?php
get_footer();
