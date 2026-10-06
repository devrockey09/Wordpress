<?php
function roseballroom_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'roseballroom' ), max( $paged, $page ) );
	}
	return $title;
}

add_filter( 'wp_title', 'roseballroom_wp_title', 10, 2 );
// Enable support for Post Thumbnails, and declare two sizes.
add_theme_support( 'post-thumbnails' );

// Active Class
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

if ( function_exists('register_sidebar') )
    register_sidebar();

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'main-menu'	=> __( 'Header Menu', 'roseballroom' ),
	'footer-menu'	=> __( 'Footer Menu', 'roseballroom' ),
	'industries-menu'	=> __( 'Industries Menu', 'roseballroom' ),
	'Our-Links'	=> __( 'Our Links', 'roseballroom' ),
	'What-We-Offer'	=> __( 'What We Offer', 'roseballroom' ),
	'About-Us'	=> __( 'About Us', 'roseballroom' ),
) );




// Register Logo 
function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );





function the_url( $url ) {
    return get_bloginfo( 'url' );
}

add_filter( 'login_headerurl', 'the_url' );
// Your own login logo title text
function isacustom_wp_login_title() {
    return 'At Home IV Nurses';
}
add_filter('login_headertitle', 'isacustom_wp_login_title');




add_filter( 'login_headerurl', 'codecanal_loginlogo_url' ); 
function codecanal_loginlogo_url($url) 
{
  return home_url(); 
  // User will be redirected to the site home page
} 

//Page Slug Body Class
  function add_slug_body_class( $classes ) {
 global $post;
 if ( isset( $post ) ) {
 $classes[] = $post->post_type . '-' . $post->post_name;
 }
return $classes;
 }
add_filter( 'body_class', 'add_slug_body_class' );



// Set Website Logo for Admin Login Page
function roseballroom_wplogo() {
    // Get the custom logo URL
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
 
    if ($logo) {
        echo '<style type="text/css">
            h1 a {
                background-image: url(' . esc_url($logo[0]) . ') !important;
                background-size: contain !important;
                background-repeat: no-repeat !important;
                width: 100% !important;
                height: 83px !important;
                display: block !important;
            }
        </style>';
    }
}
add_action('login_head', 'roseballroom_wplogo');



function year_shortcode () {
$year = date_i18n ('Y');
return $year;
}
add_shortcode ('year', 'year_shortcode');

//================ Recent  Blog start ================ 
function blog_query_shortcode($atts) {
	// de-funkify query
	//   $the_query = preg_replace('~&#x0*([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $the_query);
	//   $the_query = preg_replace('~&#0*([0-9]+);~e', 'chr(\\1)', $the_query);
	//$the_query=$atts['the_query'].'&paged='.$page ;
	$the_query = array(
	'posts_per_page' => $retVal = (!empty($atts['limit'])) ? $atts['limit'] : 10 , 
	// 'orderby' => $orderby,
	'paged' => $paged,
	'post_type' => 'post',
	'ignore_sticky_posts' => 1,
	
	);
	//echo $the_query;
	// query is made
	$q = new WP_Query($the_query);
	if($q->have_posts()) :
	ob_start();
	?>
	
    <div id="recentblog-slider" class="owl-carousel owl-theme ">
	<!-- loop start -->
	<?php while ($q->have_posts()): $q->the_post(); // print_r($q->max_num_pages); ?>
	
    <div class="blog-items">
		 <div class="img-block">
			 <a href="<?php the_permalink();?>"> 
			 <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');  if($featured_img_url){   ?>
             <?php the_post_thumbnail('recent-thumb'); ?>
			  <?php }else{ ?>  <img src="<?php bloginfo('template_directory'); ?>/images/blog-no-image.jpg" alt=""> <?php } ?>
		    </a>
		     	
		</div>
		<div class="content">
		<h3> <a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>	
		</div>
	</div>



	<?php endwhile; ?>  
    </div>

	
	<!-- loop end -->
	<?php else : ?>
	<p> Nothing found! </p>
	<?php endif; ?>
	
	
	<?php
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
	//wp_reset_postdata();
	
	}
	
	//================  Recent Post Short Code ================ 
	add_shortcode('recent-posts', 'blog_query_shortcode');
	//================  Recent Post Short Code ================ 
	//
	//
	
	
	
	//================  Blog Inner Page start ================ 
	
	
	add_image_size( 'blog-image', 576, 238, true );
    add_image_size( 'blog-thumb', 130, 178, true );
	add_image_size( 'recent-thumb', 288, 272, true );
	
	function example_theme_support() {
	remove_theme_support( 'widgets-block-editor' );
	}
	add_action( 'after_setup_theme', 'example_theme_support' );
	
	//================  blog End ================
	
	
	//================ Text limit  Start================
	function wpdocs_custom_excerpt_length( $length ) {
	return 30;
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


	 //================ numbered pagination Start ================
	
	// numbered pagination
function pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\">";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'> &raquo;</a>";
         echo "</div>\n";
     }
}
	//================ numbered pagination End ================
	//
// Register Copyright
register_sidebar(array(
	'name'=> 'About Menu',
	'id' => 'about-sidebar-menu',
	'before_widget' => '<div class="widget_nav_menu">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));

// Register Copyright
register_sidebar(array(
	'name'=> 'Commercial Menu',
	'id' => 'commercial-sidebar-memu',
	'before_widget' => '<div class="widget_nav_menu">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));

// Register Copyright
register_sidebar(array(
	'name'=> 'Residential Menu',
	'id' => 'residential-sidebar-menu',
	'before_widget' => '<div class="widget_nav_menu">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));


//Social Media, Address, Phone and Email
add_filter('admin_init', 'my_general_settings_register_buttonlinkfields');
add_filter('admin_init', 'my_general_settings_register_aboutfields');
add_filter('admin_init', 'my_general_settings_register_addressfields');
add_filter('admin_init', 'my_general_settings_register_phonefields');
add_filter('admin_init', 'my_general_settings_register_mailfields');
add_filter('admin_init', 'my_general_settings_register_fbfields');
add_filter('admin_init', 'my_general_settings_register_twfields');
add_filter('admin_init', 'my_general_settings_register_instagramfields');
add_filter('admin_init', 'my_general_settings_register_Business_Hoursfields');
function my_general_settings_register_buttonlinkfields()
{
    register_setting('general', 'button_link', 'esc_attr');
    add_settings_field('button_link', '<label for="button_link">'.__('Button Link' , 'button_link' ).'</label>' , 'my_general_settings_fields_buttonlinkhtml', 'general');
}

function my_general_settings_register_aboutfields()
{
    register_setting('general', 'about', 'esc_attr');
    add_settings_field('about', '<label for="about">'.__('About' , 'about' ).'</label>' , 'my_general_settings_fields_abouthtml', 'general');
}
function my_general_settings_register_addressfields()
{
    register_setting('general', 'address', 'esc_attr');
    add_settings_field('address', '<label for="address">'.__('Address' , 'address' ).'</label>' , 'my_general_settings_fields_addresshtml', 'general');
}


function my_general_settings_register_phonefields()
{
    register_setting('general', 'phone_number', 'esc_attr');
    add_settings_field('phone_number', '<label for="phone_number">'.__('Phone Number' , 'phone_number' ).'</label>' , 'my_general_settings_fields_phonehtml', 'general');
}

function my_general_settings_register_mailfields()
{
    register_setting('general', 'email_link', 'esc_attr');
    add_settings_field('email_link', '<label for="email_link">'.__('Email Link' , 'email_link' ).'</label>' , 'my_general_settings_fields_mailhtml', 'general');
}
function my_general_settings_register_fbfields()
{
    register_setting('general', 'facebook_link', 'esc_attr');
    add_settings_field('facebook_link', '<label for="facebook_link">'.__('Facebook Link' , 'facebook_link' ).'</label>' , 'my_general_settings_fields_facebookhtml', 'general');
}
function my_general_settings_register_twfields()
{
    register_setting('general', 'twitter_link', 'esc_attr');
    add_settings_field('twitter_link', '<label for="twitter_link">'.__('Twitter Link' , 'twitter_link' ).'</label>' , 'my_general_settings_fields_twitterhtml', 'general');
}


function my_general_settings_register_instagramfields()
{
    register_setting('general', 'instagram_link', 'esc_attr');
    add_settings_field('instagram_link', '<label for="ins_link">'.__('Instagram Link' , 'instagram_link' ).'</label>' , 'my_general_settings_fields_instagramhtml', 'general');
}
function my_general_settings_register_Business_Hoursfields()
{
    register_setting('general', 'Business_Hours', 'esc_attr');
    add_settings_field('Business_Hours', '<label for="Business_Hours">'.__('Business Hours ' , 'Business_Hours' ).'</label>' , 'my_general_settings_fields_Business_Hourshtml', 'general');
}


function my_general_settings_fields_buttonlinkhtml()
{
    $value = get_option( 'button_link', '' );
    echo '<textarea id="button_link" name="button_link">'.$value.'</textarea>';
}

function my_general_settings_fields_abouthtml()
{
    $value = get_option( 'about', '' );
    echo '<textarea id="about" name="about">'.$value.'</textarea>';
}

function my_general_settings_fields_addresshtml()
{
    $value = get_option( 'address', '' );
    echo '<textarea id="address" name="address">'.$value.'</textarea>';
}


function my_general_settings_fields_phonehtml()
{
    $value = get_option( 'phone_number', '' );
    echo '<input type="text" id="phone_number" name="phone_number" value="' . $value . '" />';
}



function my_general_settings_fields_mailhtml()
{
    $value = get_option( 'email_link', '' );
    echo '<input type="text" id="email_link" name="email_link" value="' . $value . '" />';
}
function my_general_settings_fields_facebookhtml()
{
    $value = get_option( 'facebook_link', '' );
    echo '<input type="text" id="facebook_link" name="facebook_link" value="' . $value . '" />';
}
function my_general_settings_fields_twitterhtml()
{
    $value = get_option( 'twitter_link', '' );
    echo '<input type="text" id="twitter_link" name="twitter_link" value="' . $value . '" />';
}


function my_general_settings_fields_instagramhtml()
{
    $value = get_option( 'instagram_link', '' );
    echo '<input type="text" id="instagram_link" name="instagram_link" value="' . $value . '" />';
}
function my_general_settings_fields_Business_Hourshtml()
{
    $value = get_option( 'Business_Hours', '' );
    echo '<input type="text" id="Business_Hours" name="Business_Hours" value="' . $value . '" />';
}




// BLog Page single blog
function single_blog_query_shortcode($atts) {

   $cnt = strlen($count) > 1 ? $count : '0'.$count;
 $the_query = array(
    'posts_per_page' => $retVal = (!empty($atts['limit'])) ? $atts['limit'] : 1 , 
    // 'orderby' => $orderby,
    'posts_per_page'      => 1,
	'post__in'            => get_option( 'sticky_posts' ),
	'ignore_sticky_posts' => 1,
	 
   
);

  // query is made
  $q = new WP_Query($the_query);
  if($q->have_posts()) :
  ob_start();
?>
  <div class="single-blog-sec">
    <!-- loop start -->
    <?php while ($q->have_posts()): $q->the_post(); // print_r($q->max_num_pages); 
   
    ?>

       
            <div class="block-section">
                <div class="img-block">
            	<a href="<?php the_permalink();?>"> 	
				<?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');  if($featured_img_url){   ?>
                                <?php the_post_thumbnail('blog-image'); ?>
                              <?php }else{ ?>  <img src="<?php bloginfo('template_directory'); ?>/images/blog-no-image.jpg" alt=""> <?php } ?>
                          </a>
                </div>
                <div class="text-block">
<span class="date"><?php echo get_the_date( 'M j , Y' ) ?></span> 
 <h3><?php the_title(); ?></h3>
					<p><?php $excerpt = get_the_excerpt();
          $excerpt = substr( $excerpt , 0, 999); 
          echo $excerpt; ?></p>
					<div>
                    <a class="common-btn2" href="<?php the_permalink() ?>" >Learn More</a></div>
                </div>
            </div>

    <?php endwhile; ?>  
    
    <!-- loop end -->
    <?php else : ?>
    <p> Nothing found! </p>
    <?php endif; ?>
</div>

<?php
  $output_string = ob_get_contents();
  ob_end_clean();
  return $output_string;
  //wp_reset_postdata();

}
add_shortcode('single-blog', 'single_blog_query_shortcode');

add_filter( 'big_image_size_threshold', '__return_false' );



function shortcode_team_members_grid() {

    $args = array(
        'post_type'      => 'team_member',
        'posts_per_page' => -1,
        'order'          => 'DSC',
        'orderby'        => 'date'
    );

    $query = new WP_Query( $args );

    $output = '<div class="row g-4 team-members">';

    if ( $query->have_posts() ) {

        while ( $query->have_posts() ) {
            $query->the_post();

            $id        = get_the_ID();
            $title     = get_the_title();
            $excerpt   = get_the_excerpt();
            $content   = apply_filters( 'the_content', get_the_content() );
            $modal_id  = 'teamModal_' . esc_attr( $id );
			// ⭐ Get Designation (custom field
            $designation = get_post_meta( $id, 'designation', true );

            $thumbnail = has_post_thumbnail()
                ? get_the_post_thumbnail( $id, 'full', array(
                        'class' => 'team-photo img-fluid mb-3',
                        'alt'   => esc_attr( $title )
                  ))
                : '';

            $modal_thumbnail = has_post_thumbnail()
                ? get_the_post_thumbnail( $id, 'full', array(
                        'class' => 'img-fluid mb-3',
                        'alt'   => esc_attr( $title )
                  ))
                : '';

            // MAIN GRID ITEM
            $output .= <<<HTML
<div class="col-lg-4 col-md-6 col-sm-12 scroll-reveal">
    <div class="team-member text-center">
        <div class="profile-img">{$thumbnail}</div>
		<div class="info-text">
        <h4>{$title}</h4>
		<p class="designation text-muted mb-2">{$designation}</p>
        <div class="btn-common"><a class="btn btn-common" data-bs-toggle="modal" data-bs-target="#{$modal_id}">Read More</a></div>
		</div>
    </div>
</div>
HTML;

            // MODAL CONTENT
            $output .= <<<HTML
<div class="modal fade" id="{$modal_id}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">

            <div class="flip-container">
                <div class="flipper">
                    <div class="back p-3">
					<div class="d-flex">
					<div class="image-block">
					{$modal_thumbnail}
					</div>
					<div class="text-block">
					 <h3>{$title}</h3>  
					 <h4 class="designation mb-2">{$designation}</h4>
                     {$content}
					</div>
					</div>
                       
						
						<!-- Close Button -->
                        <div class="mt-4 text-center">
                            <div class="btn-common"><a class="btn common-btn" data-bs-dismiss="modal">Close</a></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
HTML;
        }
    }

    $output .= '</div>'; // end row

    wp_reset_postdata();
    return $output;
}
add_shortcode('team_members', 'shortcode_team_members_grid');


