<?php get_header(); ?>
<?php get_template_part('inner-header'); ?>
                    <div class="top-copy" style="background-image:url(<?php the_field('top-copy-img');?>)">
                        <p><?php the_field('top-copy-text'); ?></p>
                        <p class="copy-right">©サンシャインステーブルス</p>
                    </div>
                    <div class="search-box">
                        <div class="tab-container">
                            <div class="taiken-tab tab" id="left-tab">
                                <p>体験乗馬</p>
                            </div>
                            <div class="nyukai-tab tab">
                                <p>入会クラブ探し</p>
                            </div>
                        </div>
                        <div class="search-content-taiken search-content">
                        <?php echo do_shortcode('[searchandfilter  fields="area,price_taiken,taiken_time,facility,joba_style,feature,review" types="checkbox,select,select,checkbox,checkbox,checkbox,checkbox" headings="エリア,体験最安値,体験時間,施設から探す,乗馬のスタイル,特徴から探す,口コミ" order_by="slug" hierarchical="1" operators="OR,OR,OR,OR,OR,OR,OR" class="s-taiken"]'); ?>
                        <div class="btn-wrapper"><button class="clear-btn">条件をクリア</button></div>
                        </div>
                        <div class="search-content-nyukai search-content">
                        <?php echo do_shortcode('[searchandfilter  fields="nyukai_club,area,price_taiken,taiken_time,price_nyukai,price_joba,facility,joba_style,feature,review" types="checkbox,checkbox,select,select,select,select,checkbox,checkbox,checkbox,checkbox" headings="a,エリア,体験最安値,体験時間,入会金,入会後騎乗料金,施設から探す,乗馬のスタイル,特徴から探す,口コミ" order_by="slug" hierarchical="1,1" operators="OR,OR,OR,OR,OR,OR,OR,OR,OR,OR" class="s-nyukai"]'); ?>
                        <div class="btn-wrapper"><button class="clear-btn">条件をクリア</button></div>
                        </div>
                    </div>

                    <div class="blog-new-container">
                        <div class="blog-new-titile">
                            新着コラム
                        </div>
                        <div class="relavant-post">
<?php 
$args = array(
    'post_type' => 'post',       //投稿タイプ（記事ループと条件にする）
    'posts_per_page' => 4,      //表示投稿数（記事ループと条件にする）
    'orderby' => 'post_date',    //表示順条件（記事ループと条件にする）
    'order' => 'ASC',           //降順（記事ループと条件にする）
    'post_status' => 'publish',   //公開済みのみ表示（記事ループと条件にする）
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
                    <div class="blog-popu-container">
                        <div class="blog-popu-titile">
                            人気コラム
                        </div>
                        <div class="relavant-post">
<?php 
$args = array(
    'post_type' => 'post',       //投稿タイプ（記事ループと条件にする）
    'posts_per_page' => 4,      //表示投稿数（記事ループと条件にする）
    'orderby' => 'post_date',    //表示順条件（記事ループと条件にする）
    'order' => 'ASC',           //降順（記事ループと条件にする）
    'post_status' => 'publish',   //公開済みのみ表示（記事ループと条件にする）
    'tag__in' => 246
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
                                        
               
                    

<?php get_footer(); ?>