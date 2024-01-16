<div class="article-column">
    <h3 class="article-column__title">関連コラム</h3>
    <div class="article-column__list">
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
            <a href="<?php the_permalink(); ?>" class="article-item">
                <figure class="article-item__figure"><?php image_output('m'); ?></figure>
                <div class="article-item__body">
                    <h4 class="article-item__title"><?php the_title(); ?></h4>
                    <p class="article-item__text"><?php echo get_flexible_excerpt(60); ?></p>
                </div>
            </a>
        <?php 
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>
</div>