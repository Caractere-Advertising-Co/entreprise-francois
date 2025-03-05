<div class="popup-content desktop">
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php if($post_data['galerie']) :
                foreach($post_data['galerie'] as $img) : ?>
                    <div class="swiper-slide"></div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>
