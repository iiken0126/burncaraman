<header class="header">
    <div class="container container--wide header__inner">
        <div class="logo header-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php the_field('logo', 11); ?>" alt="BURN CARAMAN">
            </a>
        </div>
        <div class="sns-links">
            <div class="sns-link">
                <?php dynamic_sidebar('header-sns'); ?>
            </div>
        </div>
    </div>
</header>