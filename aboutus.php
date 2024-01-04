<?php
/*  Template Name: About-us  */

get_header();

// Récupérations champs ACF
$title = get_field('titre');
$intro = get_field('introduction');
$btn_intro = get_field('bouton');

$galerie = get_field('galerie');

    //services
    $subtitle = get_field('sous-titre');
    $title_service = get_field('titre-section2');
    $exp_service = get_field('explications');
    $services = 'services'; // répéteur
    $btn_service = get_field('btn_services');

    //avantages
    $titreAdv = get_field('titre_section');
    $cartesAdv = 'carte_avantages'; // répéteur
    $btnAdv = get_field('btn_avantages');

    //contact 
    $subTitleCtt = get_field('subtitle-contact');
    $titleCtt = get_field('titre-contact');
    $contentCtt = get_field('content-contact');
    $formCtt = get_field('formulaire_de_contact');
?>


<section id="about-lef">
    <div class="container">
        <div class="title_content">
            <div>
                <?php echo $title;?>
            </div>
        </div>

        <div class="col_intro">
            <?php echo $intro;?>
            <a href="<?php echo $btn_intro['url'];?>" class="cta cta-white"><span><?php echo $btn_intro['title'];?></span></a>
        </div>
    </div>
</section>


<section id="services">
    <div class="container">
        <div class="swiper">
            <div class="swiper-wrapper" style="overflow:hidden;">
                <?php 
                    foreach($galerie as $img):?>
                        <div class="swiper-slide" <?php echo !empty($bgSlide) ? ' style="background:url(\''.$bgSlide['url'].'\') no-repeat;background-size:cover;"' : '';?>>
                            <img src="<?php echo $img['url'];?>" alt="<?php echo $img['title'];?>"/>
                        </div>
                    <?php endforeach;
                ?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

        <div class="title_content">
            <div>
                <h3><?php echo $subtitle;?></h3>
                <?php echo $title_service;?>
            </div>
        </div>

        
        <div id="col_services">
            <div id="exp_service">
                <?php echo $exp_service;?>
            </div>
        
            <?php 
                if(have_rows('services')):
                    while(have_rows('services')): the_row(); ?>
                    <?php
                        $carspec = array('é','è','à','ç');
                        $ref =  substr(strtolower(get_sub_field('nom_service')),0,5);
                        $id = str_replace($carspec,'e',$ref).'_id';
                    ?>
                        <div id="<?php echo $id;?>">
                            <button class="accordion"><?php echo get_sub_field('nom_service');?></button>
                            <div class="content_toggle">
                                <?php echo get_sub_field('explications-service');?>
                            </div>
                        </div>
                    <?php endwhile;
                endif;
            ?>
        </div>

        <?php if($btn_service) : ?>
            <a class="cta" href="<?php echo $btn_service['url'];?>"><span><?php echo $btn_service['title'];?></span></a>
        <?php endif;?>
    </div>
</section>

<section id="advantages">
    <div class="container">
        <?php echo $titreAdv;?>

        <div class="swiper swiper-avantages">
            <div class="swiper-wrapper">
                <?php if(have_rows('carte_avantages')) : 
                    while(have_rows('carte_avantages')) : the_row();?>
                        <?php $icone = get_sub_field('icone');?>
                        <div class="swiper-slide">
                            <div class="content">
                                <div class="adv_title">
                                    <img src="<?php echo $icone['url'];?>" alt="<?php echo $icone['title'];?>"/>
                                    <h4><?php echo get_sub_field('nom_avantages');?></h4>
                                </div>
                                <div class="adv_descr">
                                    <?php echo get_sub_field('description_avantage');?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                endif;?>            
            </div>

            <div class="swiper-button-prev swiper-button-prev-2"></div>
            <div class="swiper-button-next swiper-button-next-2"></div>
        </div>

        <a class="cta cta-white" href="<?php echo $btnAdv['url'];?>"><span><?php echo $btnAdv['title'];?></span></a>
    </div>
</section>
<section id="contact">
    <div class="container">
                
    <div class="content-title">
        <h4><?php echo $subTitleCtt;?></h4>
        <?php echo $titleCtt;?>

        <span class="separator-contact"></span>

        <?php echo $contentCtt;?>
    </div>

    <?php echo do_shortcode( $formCtt , true );?>
</section>

<?php get_template_part( 'template-parts/partenariats' );?>



<?php get_footer();?>