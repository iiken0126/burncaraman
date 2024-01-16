
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

            <article class="article">
                <div class="single-title">
                    <?php the_title(); ?>
                </div>
                <div class="single-content">
                    <?php the_content(); ?>
                </div>
            </article>

            
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