<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script src="<?php echo  get_template_directory_uri();?>/dist/main.js" defer></script>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>
        <?php 
            $base_url = get_template_directory_uri();
            $logo = get_field('logo','options');
        ?>

        <?php get_template_part('template-parts/megamenu');?>

        <div id="header" class="container">
            <a href="<?php echo get_bloginfo( 'url' );?>">
                <img class="logo" src="<?php echo  $logo['url'];?>" alt="<?php echo $logo['alt'];?>"/>
            </a>

            <div id="open_menu">
                <p>Menu</p>
                <img src="<?php echo $base_url . '/assets/img/menu.png' ;?>"/>
            </div>
        </div>

