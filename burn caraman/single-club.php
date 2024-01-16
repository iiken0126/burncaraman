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

            <article class="club">
                <div class="club-head">
                    <p class="club-pref">
                        <?php term_output('area'); ?>
                    </p>
                    <h1 class="club-name">
                        <?php the_title(); ?>
                    </h1>
                </div>
                <?php if ( has_post_thumbnail()): ?>
                    <div class="club-middle club-middle--hasThumb">
                <?php else: ?>
                    <div class="club-middle">
                <?php endif; ?>
                    <div class="club-middle__content">
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
                    </div>
                    <?php if(has_post_thumbnail()):?>
                        <div class="club-middle__thumb"><?php the_post_thumbnail("large"); ?></div>
                    <?php else: ?>
                    <?php endif; ?>
                    
                </div>
                <div class="club-info__item club-info__hp-caution">
                    <?php
                    $value = get_post_meta($post->ID,'hp_link',true);
                    if(empty($value)):
                    else:?> 
                    <a class="hp-link" href="<?php the_field('hp_link'); ?>">公式サイト</a> 
                    <?php endif;?>
                </div>
                <div class="tyusyaku">
                    <p>※入会金について</p>
                    <p>成人の会員の最安値の価格となり、年会費/月会費/騎乗ごとにかかる料金などは別途必要になる場合があります。</p>
                    <p>※入会後騎乗料について</p>
                    <p>騎乗料、指導料合わせての成人のmin.単価（チケットまとめ売りや乗り放題も含む。）また、明記されている入会のプランで入会したときにかかる騎乗料金となり、プランによっては変動する可能性があります。</p>
                </div>

            </article>

            <div class="club-foot">
                <div class="review">
                    <h3 class="review__title">口コミ</h3>
                    <div class="review-content">
                        <?php echo do_shortcode('[sc_reviewrate_output]'); ?>
                        <?php the_content(); ?>
                        <?php $post_id = get_the_ID(); ?>
                        <?php echo do_shortcode('[WPCR_SHOW SHOWFORM="0" POSTID=$post_id NUM="5"]'); ?>
                    </div>
                </div>
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

