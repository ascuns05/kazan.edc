<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

// CUSTOM FUNC
$args = array(
	'default-color' => '#fff',
	'default-image' => '',
);
add_theme_support( 'custom-background', $args );

$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '', // вызывается функций get_header_textcolor()
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	'video'                  => false, // с 4.7
	'video-active-callback'  => 'is_front_page', // с 4.7
);
add_theme_support( 'custom-header', $defaults );

add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 100,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

// function true_loadmore_scripts() {
// 	wp_enqueue_script('jquery'); // скорее всего он уже будет подключен, это на всякий случай
//  	wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );
// }
 
// add_action( 'wp_enqueue_scripts', 'true_loadmore_scripts' );





function true_load_posts(){
	$args = unserialize(stripslashes($_POST['query']));
	$args['paged'] = $_POST['page'] + 1; // следующая страницаы
	$my_post = new WP_Query($args);
?>


<?php if ( $my_post->have_posts() ) : while ( $my_post->have_posts() ) : $my_post->the_post(); ?>
<div class="col-md-12 post row">
    <div class="thumbnail-post col-md-4" style="background-image: url(<?php $thumb_id = get_post_thumbnail_id();$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);echo $thumb_url[0]; ?>)"></div>
    <div class="post-content col-md-7">
        <h1 class="text-center"><?php the_title(); ?></h1>
        <?php the_content(false); ?>
        <hr>
        <span class="date"><?php the_date();  ?></span>
        <a href="<?php the_permalink(); ?>">Подробнее</a>
        </div>
    </div>
<?php endwhile; endif; 	wp_reset_postdata(); die();?>


<?php

}

 
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
?>

<!-- CUSTOM SCRIPTS -->
<?php
function hyper_spoiler($atts, $content) {
	if (!isset($atts[name])) {$sp_name = 'Спойлер';}
	else {$sp_name = $atts[name];}
	return '<div class="spoiler-wrap">
		<div class="spoiler-head folded">'.$sp_name.'</div>
		<div class="spoiler-body">'.$content.'</div>
	</div>';
}
add_shortcode('spoiler', 'hyper_spoiler');
?>