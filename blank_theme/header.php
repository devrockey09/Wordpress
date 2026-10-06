<!DOCTYPE html>

<html lang="en">

<head>

<meta http-equiv="Content-Type" <?php bloginfo('charset'); ?> />

<meta name="format-detection" content="telephone=no">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

<title><?php wp_title('|', true, 'right'); ?></title>



<!--Website CSS -->

<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" type="text/css" rel="stylesheet">

<link href="<?php echo get_template_directory_uri(); ?>/css/superfish.css" type="text/css" rel="Stylesheet">

<link href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css" type="text/css" rel="Stylesheet">


<link href="<?php  bloginfo('stylesheet_url')?>" type="text/css" rel="stylesheet">

<link href="<?php echo get_template_directory_uri(); ?>/css/style2.css" type="text/css" rel="Stylesheet">



<!-- Google Font -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

 
<!-- FontAwesome CSS -->

<link href="<?php echo get_template_directory_uri(); ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>








<?php wp_head(); ?>

</head>

<body <?php body_class( $class ); ?>>



<header id="main-header">
    <div class="top_header">
        <div class="container d-flex  justify-content-between align-items-center">
            <div class="logo_block">
                <?php the_custom_logo(); ?>  
            </div>
            <div class="button_block d-flex  justify-content-between align-items-center">
                <div class="phone_wrapper d-flex  justify-content-between align-items-center">
                    <div class="icon-block"><img src="<?php bloginfo('template_directory'); ?>/images\call-icon.png" alt="" ></div>
                    <div class="phone_content_wrapper">
                        <h5>Call Us Now</h5>
                        <a href="tel:<?php echo get_option('phone_number'); ?>"><?php echo get_option('phone_number'); ?></a>
                    </div>
                </div>
                <div class="main_bt"> <a href="http://65.21.7.236/roseballroom/index.php/contact/">Sign Up For a Free Lesson</a> </div>
                
            </div>
            <div class="mobile_side_menu">
                <div class="" onclick="mymenuFunction()"><img src="<?php bloginfo('template_directory'); ?>/images/hamburger.svg" alt="Hamburger Logo" class="ham_icon" ></div>
                

                <div class="menu-and-phone-wrapper" id="ham-menu-icon">
                    <div class="cross" onclick="mycrossFunction()">
                        <img src="<?php bloginfo('template_directory'); ?>/images/cross.svg" alt="cross icon" >
                    </div>
                    <div class="phone_wrapper d-flex  justify-content-between align-items-center">
                    <div class="icon-block"><img src="<?php bloginfo('template_directory'); ?>/images\call-icon.png" alt="call icon" ></div>
                    <div class="phone_content_wrapper">
                        <h5>Call Us Now</h5>
                        <a href="tel:<?php echo get_option('phone_number'); ?>"><?php echo get_option('phone_number'); ?></a>
                    </div>
                </div>
                        <div class="nav_wrap" >
              <?php
                    $defaults = array(
                        'theme_location'  => 'main-menu',
                        'menu'            => '',
                        'container'       => 'ul',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'mobile-menu',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                    );
                    wp_nav_menu( $defaults );
                ?>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header">
        <div class="container d-flex  justify-content-between align-items-center">
                <div class="nav_wrap">
              <?php
                    $defaults = array(
                        'theme_location'  => 'main-menu',
                        'menu'            => '',
                        'container'       => 'ul',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'mobile-menu',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                    );
                    wp_nav_menu( $defaults );
                ?>
                </div>
            <div class="email_wrapper d-flex justify-content-end align-items-center">
                
                 <img src="<?php bloginfo('template_directory'); ?>/images/email-cion.png" alt="Email Icon">
                 <a href="mailto:<?php echo get_option('email_link'); ?>"><?php echo get_option('email_link'); ?></a>
            </div>
            <div class="menu-block mobile-menu-block">
					<span class="menu-icon" onclick="openNav()">
						<ul>
							<li></li>
							<li></li>
							<li></li>
						</ul>
					<span class="clearfix"></span>
					</span>
				</div>
        </div>
    </div>
</header>


<!-- Header End -->

