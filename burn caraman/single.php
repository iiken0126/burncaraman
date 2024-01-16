

<?php get_header(); ?>
<?php get_template_part('inner-header'); ?>
<div class="single-title">
<?php the_title(); ?>
</div>
<div class="single-date">
<?php the_time('Y-m-d'); ?>
</div>
<div class="blog-date"><?php the_date(); ?></div>
<div class="single-top-img">
<?php  image_output('club-single'); ?>
</div>
<div class="single-content">
<?php the_content(); ?>
</div>
<div class="relavant">
    <div class="relavant-title">
        関連コラム
    </div>
    <div class="relavant-post">
<?php
global $post;
$post_id = $post->ID;
// $post_id = get_the_ID(); 
$category = category_output();
$args = array(
    'post_type' => 'post',       //投稿タイプ（記事ループと条件にする）
    'posts_per_page' => 4,      //表示投稿数（記事ループと条件にする）
    'orderby' => 'post_date',    //表示順条件（記事ループと条件にする）
    'order' => 'ASC',           //降順（記事ループと条件にする）
    'post_status' => 'publish',   //公開済みのみ表示（記事ループと条件にする）
    'category__in' => $category,
);
$the_query = new WP_Query($args);
if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<a class= "relavant-card" href="<?php the_permalink(); ?>">
<div class="relavant-blog-img">
    <?php image_output('m'); ?>
</div>
<div class="relavant-blog-title">
    <?php the_title(); ?>
</div>
<div class="relavant-blog-text">
    <?php echo get_flexible_excerpt(60); ?>
</div>

</a>
<?php 
    endwhile;
endif;
wp_reset_postdata();
?>

    </div>
</div>
<?php get_footer(); ?>
