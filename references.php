<?php 
/* Template Name: Page Référence */

get_header(); 

//Récupération field

$title = get_field('titre');
$titre_presa = get_field('titre_presentation');
$descr = get_field('description');
$bouton = get_field('bouton');

?>

<section id="page-reference">
    <div class="container section-galerie">
        <div class="section_filter">
            <?php 
                $terms = get_terms('type-chantier', array(
                    'orderby' => 'name',
                    'order' => 'asc',
                    'hide-empty' => false,
                ));

                foreach ($terms as $term) :
                    echo '<div class="filter" data-filter="'. $term->name .'">'. $term->name .'</div>';
                endforeach; 
                    echo '<div class="filter" data-filter="all"> Voir tout</div>';
            ?>
        </div>

        <div class="grid-chantier">
            <?php 
                query_posts(array('post_type' => 'chantiers'));    
                if (have_posts()):
                    while (have_posts()): the_post(); ?>
                    <?php $taxs = get_the_terms(get_the_id(),'type-chantier');
                    
                        foreach($taxs as $tax):
                            $value = $tax->name;
                        endforeach;?>

                        <a data-fslightbox data-filters="<?php echo $value;?>" href="<?php echo get_the_post_thumbnail_url();?>" style="background:url('<?php echo get_the_post_thumbnail_url();?>');" <?php post_class(); ?>>
                            <article class="thumbnail">
                                <h3><?php the_title();?></h3>
                            </article>
                        </a>


                    <?php endwhile;
                endif;
                
                wp_reset_query();
            ?>
        </div>

        <a href="" class="cta"><span>Voir plus</span></a>

    </div>

    <?php get_template_part('template-parts/section-contact');?>

    <div class="container" id="section-presa">
        <div class="title_content">
            <?php echo $titre_presa;?>
        </div>

        <div class="col_intro">
            <?php echo $descr;?>

            <a href="<?php echo $bouton['url'];?>" class="cta"><span><?php echo $bouton['url'];?></span></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>