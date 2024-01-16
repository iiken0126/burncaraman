<!DOCTYPE html>
<html lang="ja">
<head>
    <?php get_header(); ?>
</head>
<body <?php body_class(); ?>>
    
    <?php get_template_part("includes/header"); ?>
    
    <div class="sp-ad-header">
            <?php dynamic_sidebar('ad-header'); ?>
    </div>

    <div class="main-col">
        
        <div class="sidebar-left">
            <?php dynamic_sidebar('ad-left') ?>
        </div>
        <main class="main-container">


            <div class="search-title"><span>検索結果</span>（
                <?php echo $wp_query->found_posts; ?>
                件）
            </div>

            <div class="result-list">
            <?php
            $paged = (int) get_query_var('paged');
            if ( have_posts() ) :
                while ( have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="result-item">
                        <div class="club-head">
                            <p class="club-pref">
                                <?php term_output('area'); ?>
                            </p>
                            <h1 class="club-name">
                                <?php the_title(); ?>
                            </h1>
                        </div>
                        <div class="result-item__content">
                        <?php if ( has_post_thumbnail()): ?>
                            <div class="club-middle club-middle--hasThumb">
                        <?php else: ?>
                            <div class="club-middle">
                        <?php endif; ?>
                            
                                <?php if(has_post_thumbnail()):?>
                                <div class="club-middle__content">
                                <?php endif;?>
                                    <div class="club-rate"><?php echo do_shortcode('[sc_rate_output]'); ?></div>
                                    <address class="club-address">
                                        <div class="club-info__item">
                                            <span class="club-icon"></span><p>〒<?php the_field('mail_number'); ?><br><?php the_field('address'); ?></p>
                                        </div>
                                    </address>
                                    <div class="club-info">
                                        <div class="club-info__item club-info__phone">
                                            <span class="club-icon"></span><p><?php the_field('phone_number'); ?></p>
                                        </div>
                                        <div class="club-info__item club-info__style">
                                            <span class="club-icon"></span><p><?php term_output('joba_style'); ?></p>
                                        </div>
                                        <div class="club-info__item club-info__feature">
                                            <span class="club-icon"></span><p><?php term_output('feature'); ?></p>
                                        </div>
                                        <div class="club-info__item club-info__facility">
                                            <p><?php term_output('facility'); ?></p>
                                        </div>
                                        <div class="club-info__item club-info__time">
                                            <span class="club-info__title">体験時間</span><p><?php term_output('taiken_time_syosai')?></p>
                                        </div>
                                        <div class="club-info__item club-info__price">
                                            <span class="club-info__title">体験最安値：</span><p class="club-info__yen"><?php the_field('price_taiken_field'); ?>円</p>
                                        </div>
                                        <div class="club-info__item club-info__nyukai">
                                            <span class="club-info__title">入会金：</span><p class="club-info__yen"><?php the_field('price_nyukai_field'); ?>円</p>
                                        </div>
                                        <div class="club-info__item club-info__nyukai-price">
                                            <span class="club-info__title">入会後騎乗料金：</span><p class="club-info__yen"><?php the_field('price_joba_field'); ?>円</p>
                                        </div>
                                        <div class="club-info__item club-info__caution">
                                            <span class="club-info__title">その他特記事項：</span>
                                            <div class="club-info__wysiwyg">
                                                <?php the_field('tokki'); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php if(has_post_thumbnail()):?>
                                </div>
                                <?php endif;?>
                                <?php if(has_post_thumbnail()):?>
                                    <div class="club-middle__thumb"><?php the_post_thumbnail("large"); ?></div>
                                <?php endif;?>
                            </div>
                        </div>
                    </a>
                <?php
                    // get_template_part( 'search-result', get_post_format() );
                endwhile;
            endif;
            ?>
            </div>
            <div class="pagination">
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

            <?php if ( is_active_sidebar( 'footer-sns' ) ) : ?>
            <div class="footer-sns-container">
                <?php dynamic_sidebar( 'footer-sns' ); ?>
            </div>
            <?php endif; ?>

        </main>
        <div class="sidebar-right">
            <?php dynamic_sidebar('ad-right')?>
        </div>
    
    </div><!--main-col-->


    <?php get_footer(); ?>

</body>
</html>

