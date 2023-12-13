<section id="partenaires">
    <?php 
    
    $part_subtitle = get_field('sous-titre','options');
    $part_descr = get_field('partenaire_description','options');
    $logos_part = get_field('logo_partenaires','options');
    
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