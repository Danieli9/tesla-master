<?php
if (isset($block['data']['preview_image_help'])) :    /* rendering in inserter preview  */
    echo '<img src="' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
else :

    $home_hero_backogrund_image = get_field('home_hero_backogrund_image');
?>
    <section class="tesla-block tesla-block-home-hero">
        <?php echo wp_get_attachment_image($home_hero_backogrund_image, 'full', '', ['class' => 'tesla']) ?>
    </section>
<?php endif; ?>