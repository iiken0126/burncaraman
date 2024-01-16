<!DOCTYPE html>
<html lang="ja">
<head>
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta description=<?php bloginfo('description'); ?>>
    <meta name="robots" content="noindex">
    <title><?php bloginfo('name'); ?></title>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/logo02.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/scroll-hint@latest/css/scroll-hint.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    <script src="https://unpkg.com/scroll-hint@latest/js/scroll-hint.min.js"></script>
    <?php WP_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="body-inner">
    <main>
        <div class="main-wrapper">
            <div class="sp-ad-header">
                <?php dynamic_sidebar('ad-header'); ?>
            </div>
            <div class="sidebar-left">
                <?php dynamic_sidebar('ad-left') ?>
            </div>