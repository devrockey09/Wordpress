<?php get_header(); ?>
<?php $admin_email = get_option( 'admin_email' ); ?> 
<?php get_header(); ?>
<section id="canvas" class="vc_section main-banner inner-banner vc_custom_1745414922597 vc_section-has-fill" style="background: url('<?php bloginfo('template_directory'); ?>/images/residential-electrician-windham-nh-scaled-1.jpg') no-repeat center; background-size:cover;"><div class="container"><div class="vc_row wpb_row vc_row-fluid vc_row-o-content-middle vc_row-flex">
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

<div class="error-page-block common-section text-center mb-4">
	<div class="container">
		<h1><?php _e( 'Not Found', 'forum' ); ?></h1>
        <h4><?php _e( 'Sorry, the page you tried cannot be found.', 'forum' ); ?></h4>
        <p>You may have typed address incorrectly. If you found a broken link from another site or from our site, please. <a href="mailto:<?php echo $admin_email; ?>">email us</a></p>

        <div class="link-block">
			<a class="common-btn" href="<?php echo home_url(); ?>"><strong>Go to Our Homepage</strong></a>
        </div>
	</div>
</div>

<?php get_footer(); ?>
