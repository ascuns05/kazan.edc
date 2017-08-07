<?php get_header(); ?>
<section id="content" role="main">
<?php $args['paged'] = 1 ?>
<?php $my_post = new Wp_Query($args); ?>
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
<?php endwhile; endif; ?>
<?php #get_template_part( 'nav', 'below' ); ?>
</section>



<!--подгурзка постов-->
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<script id="true_loadmore">
	var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
	var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
	var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
	</script>
<?php endif; ?>
<script src="<?php bloginfo('template_directory') ?>/js/loadmore.js"></script>
<?php get_footer(); ?>