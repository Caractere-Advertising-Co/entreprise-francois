<?php get_header();?>

<section id="hero-section">
    <div class="swiper">
        <div class="swiper-wrapper">

            <?php if(have_rows('slide')):
                while(have_rows('slide')): the_row();?>
                    <?php $btn = get_sub_field('bouton');?>

                    <div class="swiper-slide">
                        <div class="content">
                            <?php echo get_sub_field('titre');?>
                            <?php echo get_sub_field('baseline');?>
                            
                            <?php if($btn) : ?>
                                <a class="cta hero-btn" href="<?php echo $btn['url'];?>"><?php echo $btn['title'];?></a>
                            <?php endif;?>
                        </div>
                            </div>
                <?php endwhile;
            endif;?>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="divider"></div>
</section>

<section id="about-us">
    <div class="divider divider-top"></div>

    <div class="container">
        <div class="col-g">
            <?php the_field('accroche');?>
        </div>
        
        <div class="col-d">
            <?php $btn = get_field('liens_about');?>
            <?php the_field('description_presentation');?>
            <a class="cta" href="<?php echo $btn['url'];?>" ;?> <?php echo $btn['title'];?></a>
        </div>
        
    </div>

    <div class="divider"></div>
</section>

<section id="partenaires">
    <?php 
    
    $part_subtitle = get_field('sous-titre');
    $part_descr = get_field('partenaire_description');
    $logos_part = get_field('logo_partenaires');
    
    ?>
 
    <div class="container">
        <div class="intro">
            <?php echo $part_descr;?>
        </div>    
        <p class="subtitle">
            <?php echo $part_subtitle;?>
        </p>

            <div class="gallery container">
                <?php if($logos_part) :
                    foreach($logos_part as $logo): 
                        echo '<img src="'.$logo['url'].'" alt="'.$logo['title'].'" class="logo_partenaires" lazy/>';
                    endforeach;
                endif;?>
            </div>
    </div>
</section>

<section id="references">
    <div class="container">
        <?php $title = get_field('titre_reference');?>

        <?php echo $title;?>

        <table>
            <tbody>
                <?php query_posts( array('post_type' => 'chantiers'));
                    if(have_posts()):
                        while(have_posts()): the_post();?>
                        <tr>
                            <td class="thumbnail"> <?php the_post_thumbnail();?></td>
                            <td class="descr_ref">
                                <span class="date"> <?php the_date('d.m.Y');?></span>
                                <h3><?php the_title();?></h3>
                                <?php the_content();?>
                                <a href="">Lire plus...</a>
                            </td>
                        </tr>
                        <?php endwhile;
                    endif;

                    wp_reset_query();
                ?>
            </tbody>
        </table>
        <a class="cta" href=""> voir plus </a>
    </div>
</section>

<section id="contact-us">
    <div class="container">
        <?php 
            $contact_title = get_field('titre-contact');
            $contact_txt = get_field('texte_contact');
        ?>
        <?php echo $contact_title;?>
        <?php echo $contact_txt;?>

        <a class="cta" href=""> Contact</a>
    </div>
</section>

<?php get_footer();?>