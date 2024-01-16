


<a href="<?php the_permalink(); ?>" class="search-result-content">
    <div class="search-result-content-inner-left">
        <p class="sr-area"><?php term_output('area'); ?></p>
        <h4 class="sr-title"><?php the_title(); ?></h4>
        <p class="sr-address"><?php the_field('address'); ?></p>
        <p class="sr-ratereview"><?php echo do_shortcode('[sc_rate_output]');?><span class="kensu"><?php echo do_shortcode('[sc_review_output]'); ?>件</span></p>
        <p class="sr-phone-num"><?php the_field('phone_number');?></p>
        <div class="sr-taiken-time">体験時間<?php term_output('taiken_time_syosai')?></div>
        <div class="sr-price-taiken">体験最安値<span><?php the_field('price_taiken_field'); ?></span>円</div>
        <div class="sr-price-nyukai">入会金<span><?php the_field('price_nyukai_field');?></span>円</div>
        <div class="sr-price-joba">入会後騎乗料金<span><?php the_field('price_joba_field'); ?></span>円</div>
        <div class="joba-style"><?php term_output('joba_style'); ?></div>
        <div class="sr-facility"><?php term_output('facility'); ?></div>
        <div class="sr-feature"><?php term_output('feature'); ?></div>
        
    </div>
    <div class="search-result-content-inner-right">
        <div class="club-img"><?php image_output('search-result'); ?></div>
        <div class="tyusyaku">
            <p>※入会金について</p>
            <p>成人の会員の最安値の価格となり、年会費/月会費/騎乗ごとにかかる料金などは別途必要になる場合があります。</p>
            <p>※入会後騎乗料について</p>
            <p>騎乗料、指導料合わせての成人のmin.単価（チケットまとめ売りや乗り放題も含む。）また、明記されている入会のプランで入会したときにかかる騎乗料金となり、プランによっては変動する可能性があります。</p>
        </div>
    </div>
</a>        

