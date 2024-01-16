<?php get_header(); ?>
<?php get_template_part('inner-header'); ?>
    <div class="club-container">
        <div class="prefecture">
            <?php term_output('area'); ?>
        </div>
        <div class="club-name"><?php the_title(); ?></div>
        <?php echo do_shortcode('[sc_rate_output]'); ?>
        <div class="address">
            <div class="mail-num"><?php the_field('mail_number'); ?></div>
            <div class="address-inner"><?php the_field('address'); ?></div>
        </div>
        <div class="phone"><?php the_field('phone_number'); ?></div>
        <div class="joba-style"><?php term_output('joba_style'); ?></div>
        <div class="feature"><?php term_output('feature'); ?></div>
        <div class="facility"><?php term_output('facility'); ?></div>
        <div class="taiken-time"><dt>体験時間</dt><?php term_output('taiken_time_syosai'); ?></div>
        <div class="price-taiken"><dt>体験最安値：</dt><dd><?php the_field('price_taiken_field'); ?>円</dd></div>
        <div class="price-nyukai"><p>入会金：</p><?php the_field('price_nyukai_field'); ?>円</div>
        <div class="price-joba"><p>入会後騎乗料金：</p><?php the_field('price_joba_field'); ?>円</div>
        <div class="tokki"><p>その他特記事項：</p><p><?php the_field('tokki'); ?></p></div>
        <div class="hp-link-tyusyaku">

<?php
$value = get_post_meta($post->ID,'hp_link',true);
if(empty($value)):
else:?> 
<a class="hp-link" href="<?php the_field('hp_link'); ?>">公式サイト</a> 
<?php endif;?>

    <div class="tyusyaku">
            <p>※入会金について</p>
            <p>成人の会員の最安値の価格となり、年会費/月会費/騎乗ごとにかかる料金などは別途必要になる場合があります。</p>
            <p>※入会後騎乗料について</p>
            <p>騎乗料、指導料合わせての成人のmin.単価（チケットまとめ売りや乗り放題も含む。）また、明記されている入会のプランで入会したときにかかる騎乗料金となり、プランによっては変動する可能性があります。</p>
    </div>


</div>
        
        <div class="club-single-img"><?php image_output('club-single');?></div>
        <div class="tyusyaku-footer">
            <p>※入会金について</p>
            <p>成人の会員の最安値の価格となり、年会費/月会費/騎乗ごとにかかる料金などは別途必要になる場合があります。</p>
            <p>※入会後騎乗料について</p>
            <p>騎乗料、指導料合わせての成人のmin.単価（チケットまとめ売りや乗り放題も含む。）また、明記されている入会のプランで入会したときにかかる騎乗料金となり、プランによっては変動する可能性があります。</p>
        </div>
        <?php $post_id = get_the_ID(); ?>
        <div class="review-icon">口コミ</div>
        <?php echo do_shortcode('[sc_reviewrate_output]'); ?>
        <?php the_content(); ?>
        <?php $post_id = get_the_ID(); ?>
        <?php echo do_shortcode('[WPCR_SHOW SHOWFORM="0" POSTID=$post_id NUM="5"]'); ?>
    </div>
<?php get_footer(); ?>

