<?php get_header(); ?>
<?php get_template_part('inner-header'); ?>
    <div class="search-title"><span>検索結果</span>（
        <?php echo $wp_query->found_posts; ?>
        件）
    </div>
    <div class="pagination">
    <?php
        $paged = (int) get_query_var('paged');
        if ( have_posts() ) :
            while ( have_posts()) : the_post();
                get_template_part( 'search-result', get_post_format() );
            endwhile;
        endif;
?>
        <div class="links">
<?php
        if ($wp_query->max_num_pages > 0) {
            echo paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => '/page/%#%',
                'current' => max(1, $paged),
                'mid_size' => 1,
                'end_size' => 1,
                'total' => $wp_query->max_num_pages,
                'prev_next' => false,
            ));
        }

    ?>
    </div>
</div><!-- pagination -->
<?php get_footer(); ?>