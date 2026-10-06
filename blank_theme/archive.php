<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
 <?php
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
        ?>
<div class="post">
        <section id="canvas" class="vc_section main-banner inner-banner vc_custom_1745414922597 vc_section-has-fill" style="background: url('<?php echo esc_url( $src[0] ); ?>') no-repeat center; background-size:cover;"><div class="container"><div class="vc_row wpb_row vc_row-fluid vc_row-o-content-middle vc_row-flex">
            <div class="wpb_column vc_column_container">
                <div class="vc_column-inner"><div class="wpb_wrapper">
                    <div class="wpb_text_column wpb_content_element text-block">
                        <div class="wpb_wrapper">
                        </div>
                    </div>
                </div></div></div>
            </div>
        </div>
    </section>
	

<div class="container">
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">		
	<div class="common-section">
        <div class="container">
            <div class="row row-reverse">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div id="sidebar" class="sidebar-menu block sticky-top" >
                        <?php get_sidebar(); ?>
                    </div>
                </div>
                
                <div class="common-text-block col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog-section">
			<div class="lower_box">
				<div class="row">
		<?php if ( have_posts() ) : ?>

			<!--<header class="page-header">
				<?php
					//the_archive_title( '<h1 class="page-title">', '</h1>' );
					//the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>--><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
			

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				//get_template_part( 'content', get_post_format() );
				?>
			
                
                        <div class="col-md-6">
		<div class="card">
		<div class="img-block">
			 <a href="<?php the_permalink();?>"> 
			 <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'blog-image');  if($featured_img_url){   ?>
             <?php the_post_thumbnail('blog-thumb'); ?>
			  <?php }else{ ?>  <img src="<?php bloginfo('template_directory'); ?>/images/blog-no-image.jpg" alt=""> <?php } ?>
		    </a>
		</div>
			
		<div class="text-block">
		<h2> <?php the_title(); ?></h2>
		 <?php the_excerpt(); ?>
		<a class="common-btn" href="<?php the_permalink(); ?>">Learn More</a>
		</div>
			</div>


		 

	</div>
                    
               
                
                
                <?php

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>
</div>
                </div>
			</div>

                </div>
                
            </div>
        </div>
    </div>
			
			
			
			
		</main><!-- .site-main -->
	</section><!-- .content-area -->
    </div>
</div>
<?php get_footer(); ?>
