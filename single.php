<?php get_header(); ?>
<section class="pages content" id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <span class="date"><?php the_date(); ?></span>
    <br>
    <p><?php the_content(); ?></p>
<?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>