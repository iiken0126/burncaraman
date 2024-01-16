
<!DOCTYPE html>
<html lang="ja">
<head>
    <?php get_header(); ?>
</head>
<body <?php body_class(); ?>>
    
    <?php get_template_part("includes/header"); ?>

    <div class="top-copy">
        <figure class="top-copy__figure"><img src="<?php the_field('top-copy-img');?>" alt=""></figure>
        <div class="top-copy__content container">
            <p class="top-copy__text"><?php the_field('top-copy-text'); ?></p>
            <p class="top-copy__copyright">©サンシャインステーブルス</p>
        </div>
    </div>
    <div class="sp-ad-header">
            <?php dynamic_sidebar('ad-header'); ?>
    </div>

    <div class="main-col">
        <div class="sidebar-left">
            <?php dynamic_sidebar('ad-left') ?>
        </div>
        <main class="main-container">
            <div class="main-lead">
                <p>「まずは乗馬をやってみたい人向け。旅行先のレジャーとして自然を楽しむトレッキングコースもこちらから！」<br>入会クラブ探しの上に「入会するクラブを探している人向け。入会金と入会後都度騎乗料をメインに探すことができます。」</p>
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
                    <div class="btn-wrapper">
                        <button class="clear-btn">条件をクリア</button>
                    </div>
                </div>
                <div class="search-content-nyukai search-content">
                    <?php echo do_shortcode('[searchandfilter  fields="nyukai_club,area,price_taiken,taiken_time,price_nyukai,price_joba,facility,joba_style,feature,review" types="checkbox,checkbox,select,select,select,select,checkbox,checkbox,checkbox,checkbox" headings="a,エリア,体験最安値,体験時間,入会金,入会後騎乗料金,施設から探す,乗馬のスタイル,特徴から探す,口コミ" order_by="slug" hierarchical="1,1" operators="OR,OR,OR,OR,OR,OR,OR,OR,OR,OR" class="s-nyukai"]'); ?>
                    <div class="btn-wrapper">
                        <button class="clear-btn">条件をクリア</button>
                    </div>
                </div>
            </div>
            <div class="article-column">
                <h3 class="article-column__title">新着コラム</h3>
                <div class="article-column__list">
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
            <div class="article-column">
                <h3 class="article-column__title">人気コラム</h3>
                <div class="article-column__list">
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
            
            <?php if ( is_active_sidebar( 'footer-sns' ) ) : ?>
            <div class="footer-sns-container">
                <?php dynamic_sidebar( 'footer-sns' ); ?>
            </div>
            <?php endif; ?>

        </main>
        
        <?php if(is_archive()): ?>
            <div class="tyusyaku-bottom">
                    <p>※入会金について</p>
                    <p>成人の会員の最安値の価格となり、年会費/月会費/騎乗ごとにかかる料金などは別途必要になる場合があります。</p>
                    <p>※入会後騎乗料について</p>
                    <p>騎乗料、指導料合わせての成人のmin.単価（チケットまとめ売りや乗り放題も含む。）また、明記されている入会のプランで入会したときにかかる騎乗料金となり、プランによっては変動する可能性があります。</p>
                </div>
        <?php endif ?>

        <div class="sidebar-right">
            <?php dynamic_sidebar('ad-right')?>
        </div>
    
    </div><!--main-col-->

    

    <?php get_footer(); ?>

</body>
</html>