<section id="contact-us">
    <div class="container">
        <?php 
            $contact_title = get_field('titre-contact','options');
            $contact_txt = get_field('texte_contact','options');
        ?>
        <?php echo $contact_title;?>
        <?php echo $contact_txt;?>

        <a class="cta" href="">Contact</a>
    </div>
</section>