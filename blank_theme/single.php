<?php
get_header();
?>
<div class="blog-single-page">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="blog-banner inner-banner" style="background: url('<?php echo get_template_directory_uri(); ?>/images/common-banner.jpg') no-repeat center; background-size:cover;">

    </section>
    
      
    <div class="blog-content-section">
        <div class="container">
            <div class="top-content">
				<div class="title-blk">
				<div class="blog-post-date"><span class="categories"><?php echo get_the_category($mypost->ID)[0]->cat_name; ?></span> <span class="name"><?php echo get_the_author( 'display_name', '$author_id'); ?></span> <span class="date"><?php echo get_the_date( 'M d, Y'); ?></span> </div>
        <h1><?php the_title(); ?></h1></div>
                 <div class="image-block">
                   <?php the_post_thumbnail(); ?>
                </div>
                
            </div>
           <div class="wrapper"> 
            <?php
                                the_content();
                                ?>
           </div>
        </div>
    </div>
</article>
</div>
<?php
get_footer();