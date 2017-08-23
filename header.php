<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/libs/bootstrap.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/libs/fonts.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/libs/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="wrapper" class="hfeed">
            <header id="header" role="banner">
                <div class="header-image" style="background-image: url(<?php if ( $_SERVER['REQUEST_URI'] == '/events/' || is_front_page() || is_home() || is_front_page() && is_home() ) { header_image(); } else { $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail', true); echo $thumb_url[0]; } ?>)"></div>
                <div class="container">
                    <div class="row">
                        <div class="head-top col-md-12">
                            <section id="branding" class="col-md-3">
                                <div id="site-title"><?php echo get_custom_logo(); ?></div>
                            </section>

                            <div class="top-menu col-md-9 col-sm-6 hidden-sm-down">
                                <nav class="col-md-10  offset-md-2 " id="menu" role="navigation">
                                    <div class="menu right">
                                    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                                    </div>
                                    
                                </nav>
                            </div>
                            <div class="mobile-menu hidden-md-up">
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                            </div>
                            
                        </div>
                        
                        <!-- HEADER DESCRIPTION -->
                    <h1 class="col-md-6 offset-md-3 text-center" style="color: #<?php echo get_header_textcolor(); ?>" id="site-description"><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { bloginfo( 'description' );}elseif ($_SERVER['REQUEST_URI'] == '/events/') {echo 'Мероприятия';} else {the_title();} ?></div>
                    </div>
                </div>
                <div class="mobile-main-menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                </div>
            </header>
            <div class="container" id="container">
